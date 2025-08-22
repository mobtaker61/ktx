<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ImageUploadController extends Controller
{
    public function store(Request $request)
    {
        Log::info('Image upload request received', [
            'files' => $request->allFiles(),
            'headers' => $request->headers->all(),
        ]);

        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        try {
            $file = $request->file('upload');
            Log::info('File received', [
                'original_name' => $file->getClientOriginalName(),
                'size' => $file->getSize(),
                'mime_type' => $file->getMimeType(),
            ]);

            $fileName = time().'_'.Str::random(10).'.'.$file->getClientOriginalExtension();

            // Store in public/editor-images directory
            $path = $file->storeAs('editor-images', $fileName, 'public');

            $url = asset('storage/'.$path);

            Log::info('Image uploaded successfully', [
                'path' => $path,
                'url' => $url,
            ]);

            return response()->json([
                'url' => $url,
                'uploaded' => 1,
                'fileName' => $fileName,
            ]);

        } catch (\Exception $e) {
            Log::error('Image upload failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'uploaded' => 0,
                'error' => [
                    'message' => 'Could not upload image: '.$e->getMessage(),
                ],
            ], 500);
        }
    }
}
