<?php

namespace App\Enums\News;

enum StatusEnum: string
{
    case DRAFT = 'draft';
    case PUBLISHED = 'published';
    case BLOCKED = 'blocked';
    case DELETED = 'deleted';

    public static function getValues(): array
    {
        $result = [];

        foreach (self::cases() as $object) {
            $result[] = $object->value;
        }

        return $result;
    }
}
