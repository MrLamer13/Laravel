<?php

namespace App\Enums\News;

enum StatusEnum: string
{
    case ACTIVE = 'ACTIVE';
    case DRAFT = 'DRAFT';
    case PUBLISHED = 'PUBLISHED';
    case BLOCKED = 'BLOCKED';
    case DELETED = 'DELETED';

    public static function getValues(): array
    {
        $result = [];

        foreach (self::cases() as $object) {
            $result[] = $object->value;
        }

        return $result;
    }
}
