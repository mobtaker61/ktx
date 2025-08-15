<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CompanyGalleryController extends Controller
{
    public function getCompanyImages($company)
    {
        $companyImages = [];
        $basePath = public_path('img/partners/' . $company);

        if (File::exists($basePath)) {
            $files = File::files($basePath);

            foreach ($files as $file) {
                $extension = strtolower($file->getExtension());
                if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                    $companyImages[] = [
                        'filename' => $file->getFilename(),
                        'path' => 'img/partners/' . $company . '/' . $file->getFilename(),
                        'full_path' => asset('img/partners/' . $company . '/' . $file->getFilename())
                    ];
                }
            }
        }

        return response()->json($companyImages);
    }

    public function getAllCompaniesImages()
    {
        $companies = ['kobelco', 'tci', 'xiya'];
        $allImages = [];

        foreach ($companies as $company) {
            $allImages[$company] = $this->getCompanyImages($company)->getData();
        }

        return response()->json($allImages);
    }
}
