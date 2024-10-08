<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;
    protected $fillable = [
        'author_id',
        'latitude',
        'longitude',
        'name',
        'location',
        'image_path',
        'description',
    ];
}
