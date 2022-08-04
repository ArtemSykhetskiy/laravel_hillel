<?php

namespace App\Services\Contracts;

use Illuminate\Http\UploadedFile;

interface FileStorageServiceInterface
{
    public static function upload(UploadedFile|string $file) : string;
    public static function remove(string $file);
}
