<?php

namespace App\Services;

use App\Services\Contracts\UploadInterface;
use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpFoundation\File\Exception\UploadException;

class UploadService implements UploadInterface
{

    public function save(UploadedFile $file): string
    {
        $name = md5($file->getClientOriginalName());
        $ext = $file->getClientOriginalExtension();
        $result = $file->storeAs('/news', $name . '.' . $ext, 'public');
        if ($result !== false) {
            return $result;
        }

        throw new UploadException('Не удалось загрузить файл');
    }
}
