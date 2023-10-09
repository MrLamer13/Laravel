<?php

namespace App\Enums\Users;

enum TypeAuthEnum: string
{
    case SITE = 'site';
    case MAILRU = 'mailru';
    case YANDEX = 'yandex';
    case GITHUB = 'github';

    public static function getValues(): array
    {
        $result = [];

        foreach (self::cases() as $object) {
            $result[] = $object->value;
        }

        return $result;
    }
}
