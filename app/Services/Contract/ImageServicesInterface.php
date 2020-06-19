<?php


namespace App\Services\Contract;

use Illuminate\Http\UploadedFile;


interface ImageServicesInterface
{
    public function upload(UploadedFile $file): string;
    public function remove(string $file);
}
