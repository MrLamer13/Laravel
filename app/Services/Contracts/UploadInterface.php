<?php

namespace App\Services\Contracts;

use Illuminate\Http\UploadedFile;

interface UploadInterface
{
    public function save(UploadedFile $file):string;
}
