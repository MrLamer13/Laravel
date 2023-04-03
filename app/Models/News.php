<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'title',
        'author',
        'status',
        'image',
        'description',
        'isVisible'
    ];

    protected $casts = [
        'isVisible' => 'bool'
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(
            Category::class,
            'categories_has_news',
            'news_id',
            'category_id'
        );
    }

    public function sources(): HasMany
    {
        return $this->hasMany(
            Source::class,
            'news_id',
            'id'
        );
    }
}
