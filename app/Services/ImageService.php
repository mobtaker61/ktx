<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImageService
{
    /**
     * Upload and process an image
     */
    public function upload(UploadedFile $file, $model, $options = [])
    {
        $options = array_merge([
            'disk' => 'public',
            'path' => 'images',
            'thumbnails' => true,
            'sizes' => [
                'thumbnail' => [150, 150],
                'medium' => [300, 300],
                'large' => [800, 800]
            ]
        ], $options);

        // Generate unique filename
        $filename = $this->generateFilename($file);
        $path = $options['path'] . '/' . date('Y/m/d');
        $fullPath = $path . '/' . $filename;

        // Store original file
        $file->storeAs($path, $filename, $options['disk']);

        // Create thumbnails if requested
        if ($options['thumbnails']) {
            $this->createThumbnails($fullPath, $options['sizes'], $options['disk']);
        }

        // Create image record
        $image = $model->images()->create([
            'filename' => $filename,
            'original_name' => $file->getClientOriginalName(),
            'path' => $fullPath,
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize(),
            'alt_text' => $options['alt_text'] ?? null,
            'caption' => $options['caption'] ?? null,
            'is_primary' => $options['is_primary'] ?? false,
            'order' => $options['order'] ?? 0
        ]);

        return $image;
    }

    /**
     * Generate unique filename
     */
    private function generateFilename(UploadedFile $file)
    {
        $extension = $file->getClientOriginalExtension();
        $name = Str::random(40);
        return $name . '.' . $extension;
    }

    /**
     * Create thumbnails for an image
     */
    private function createThumbnails($imagePath, $sizes, $disk)
    {
        $fullPath = Storage::disk($disk)->path($imagePath);

        foreach ($sizes as $sizeName => $dimensions) {
            $thumbnailPath = $this->getThumbnailPath($imagePath, $sizeName);

            $image = Image::make($fullPath);
            $image->fit($dimensions[0], $dimensions[1], function ($constraint) {
                $constraint->upsize();
            });

            Storage::disk($disk)->put($thumbnailPath, $image->encode());
        }
    }

    /**
     * Get thumbnail path
     */
    private function getThumbnailPath($imagePath, $sizeName)
    {
        $pathInfo = pathinfo($imagePath);
        return $pathInfo['dirname'] . '/thumbnails/' . $sizeName . '_' . $pathInfo['basename'];
    }

    /**
     * Delete image and its thumbnails
     */
    public function delete($image)
    {
        // Delete original file
        Storage::disk('public')->delete($image->path);

        // Delete thumbnails
        $pathInfo = pathinfo($image->path);
        $thumbnailDir = $pathInfo['dirname'] . '/thumbnails';

        if (Storage::disk('public')->exists($thumbnailDir)) {
            $files = Storage::disk('public')->files($thumbnailDir);
            foreach ($files as $file) {
                if (Str::contains($file, $pathInfo['basename'])) {
                    Storage::disk('public')->delete($file);
                }
            }
        }

        // Delete image record
        $image->delete();
    }

    /**
     * Set primary image
     */
    public function setPrimary($image)
    {
        // Remove primary from other images of the same model
        $image->imageable->images()->update(['is_primary' => false]);

        // Set this image as primary
        $image->update(['is_primary' => true]);
    }

    /**
     * Reorder images
     */
    public function reorder($model, $imageIds)
    {
        foreach ($imageIds as $order => $imageId) {
            $model->images()->where('id', $imageId)->update(['order' => $order]);
        }
    }
}
