<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'text',
        'is_publish',
    ];

    protected $casts = [
        'is_publish' => 'boolean'
    ];
}
