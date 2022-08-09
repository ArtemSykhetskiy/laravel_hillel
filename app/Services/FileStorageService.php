<?php

namespace App\Services;

use App\Services\Contracts\FileStorageServiceInterface;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FileStorageService implements FileStorageServiceInterface
{

    public static function upload($file): string
    {
        if(is_string($file)){
            return str_replace('public/storage', '', $file);
        }

        $filePath = 'public/' . static::randomName() . '.' . $file->getClientOriginalExtension();
        \Storage::put($filePath, File::get($file));

        return $filePath;

    }

    public static function remove($file)
    {
        if(file_exists($file)){
            Storage::delete($file);
        }

        return true;
    }

    protected static function randomName(): string
    {
        return \Str::random() . time();
    }
}
