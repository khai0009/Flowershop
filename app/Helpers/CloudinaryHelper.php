<?php

use Cloudinary\Cloudinary;
use Cloudinary\Transformation\Resize;

if (!function_exists('cloudinary')) {
    function cloudinary()
    {
        return new Cloudinary(
            [
                'cloud' => [
                    'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                    'api_key' => env('CLOUDINARY_API_KEY'),
                    'api_secret' => env('CLOUDINARY_API_SECRET'),
                ],
                'url' => [
                    'secure' => true,
                ],
            ]
        );
    }
    
}
if (!function_exists('resizeImage')) {
    function resizeImage($imageUrl, $width, $height, $cropMode = 'fill')
    {
        return cloudinary()->image($imageUrl)->resize(Resize::{$cropMode}($width, $height))->toUrl();
    }
}