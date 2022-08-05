<?php

namespace App\Services;

use App\Services\Contracts\FileStorageServiceInterface;
use Illuminate\Support\Facades\File;

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
        // TODO: Implement remove() method.
    }

    protected static function randomName(): string
    {
        return \Str::random() . time();
    }
}
