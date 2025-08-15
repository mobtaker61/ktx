<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Product;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ImageController extends Controller
{
    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    /**
     * Upload image for a model
     */
    public function upload(Request $request): JsonResponse
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'model_type' => 'required|string',
            'model_id' => 'required|integer',
            'alt_text' => 'nullable|string|max:255',
            'caption' => 'nullable|string|max:255',
            'is_primary' => 'boolean'
        ]);

        try {
            // Find the model
            $modelClass = 'App\\Models\\' . $request->model_type;
            $model = $modelClass::findOrFail($request->model_id);

            // Upload image
            $image = $this->imageService->upload($request->file('image'), $model, [
                'alt_text' => $request->alt_text,
                'caption' => $request->caption,
                'is_primary' => $request->boolean('is_primary', false)
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Image uploaded successfully',
                'image' => $image
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to upload image: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Delete an image
     */
    public function destroy(Image $image): JsonResponse
    {
        try {
            $this->imageService->delete($image);

            return response()->json([
                'success' => true,
                'message' => 'Image deleted successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete image: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Set image as primary
     */
    public function setPrimary(Image $image): JsonResponse
    {
        try {
            $this->imageService->setPrimary($image);

            return response()->json([
                'success' => true,
                'message' => 'Image set as primary successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to set image as primary: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Reorder images
     */
    public function reorder(Request $request): JsonResponse
    {
        $request->validate([
            'model_type' => 'required|string',
            'model_id' => 'required|integer',
            'image_ids' => 'required|array',
            'image_ids.*' => 'integer'
        ]);

        try {
            // Find the model
            $modelClass = 'App\\Models\\' . $request->model_type;
            $model = $modelClass::findOrFail($request->model_id);

            // Reorder images
            $this->imageService->reorder($model, $request->image_ids);

            return response()->json([
                'success' => true,
                'message' => 'Images reordered successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to reorder images: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get images for a model
     */
    public function getImages(Request $request): JsonResponse
    {
        $request->validate([
            'model_type' => 'required|string',
            'model_id' => 'required|integer'
        ]);

        try {
            // Find the model
            $modelClass = 'App\\Models\\' . $request->model_type;
            $model = $modelClass::findOrFail($request->model_id);

            $images = $model->images()->ordered()->get();

            return response()->json([
                'success' => true,
                'images' => $images
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to get images: ' . $e->getMessage()
            ], 500);
        }
    }
}
