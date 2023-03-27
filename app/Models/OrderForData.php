<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderForData extends Model
{
    use HasFactory;

    protected $table = 'orderfordata';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'order'
    ];
}
