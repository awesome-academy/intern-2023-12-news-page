<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

if (!function_exists('formatDate')) {
    function formatDate($date, string $format = 'd/m/Y')
    {
        if ($date instanceof \Carbon\Carbon) {
            return $date->format($format);
        }

        return $date;
    }
}

if (!function_exists('uploadImageContentPost')) {
    function uploadImageContentPost($data, $key, $img)
    {
        $mimeType = finfo_buffer(finfo_open(), $data, FILEINFO_MIME_TYPE);

        $extensions = [
            'image/jpeg' => 'jpg',
            'image/png'  => 'png',
            'image/gif'  => 'gif',
            'image/svg+xml' => 'svg',
        ];

        $extension = $extensions[$mimeType] ?? 'png';

        $pathImage = '/uploads/post/content/';
        $directoryPath = public_path($pathImage);
        if (!File::exists($directoryPath)) {
            File::makeDirectory($directoryPath, 0777, true, true);
        }

        $imageName = $pathImage . time() . $key . '.' . $extension;
        file_put_contents(public_path() . $imageName, $data);

        $img->removeAttribute('src');
        $img->setAttribute('src', $imageName);
    }
}

if (!function_exists('uploadImageThumbnailPost')) {
    function uploadImageThumbnailPost($data): string
    {
        $filename = time() . $data->getClientOriginalName();
        $pathImage = 'uploads/post/thumbnail';
        $directoryPath = public_path($pathImage);
        if (!File::exists($directoryPath)) {
            File::makeDirectory($directoryPath, 0777, true, true);
        }

        $data->move($directoryPath, $filename);

        return $pathImage . '/' . $filename;
    }
}

if (!function_exists('uploadAvatarProfile')) {
    function uploadAvatarProfile($data): string
    {
        $filename = time() . $data->getClientOriginalName();
        $pathImage = 'uploads/profile/avatar';
        $directoryPath = public_path($pathImage);
        if (!File::exists($directoryPath)) {
            File::makeDirectory($directoryPath, 0777, true, true);
        }

        $data->move($directoryPath, $filename);

        return $pathImage . '/' . $filename;
    }
}

if (!function_exists('stringToArr')) {
    function stringToArr($string)
    {
        if (!empty($string)) {
            return explode(',', $string);
        }

        return [];
    }
}

if (!function_exists('userAuth')) {
    function userAuth(): ?\Illuminate\Contracts\Auth\Authenticatable
    {
        return Auth::user();
    }
}

if (!function_exists('deleteImageByPath')) {
    function deleteImageByPath($path)
    {
        if (File::exists($path)) {
            File::delete($path);
        }
    }
}
