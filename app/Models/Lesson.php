<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'text',
        'is_publish',
        'category_id',
    ];

    protected $casts = [
        'is_publish' => 'boolean'
    ];

    public function category(): HasOne
    {
        return $this->hasOne(
            LessonCategory::class,
            'id',
            'category_id'
        );
    }
}
