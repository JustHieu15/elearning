<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Question extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'question';

    protected $fillable = [
        'title',
        'img',
        'subject_id',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'unique' => true,
                'onUpdate' => true
            ]
        ];
    }

    public static function boot()
    {
        parent::boot();

        static::updating(function ($question) {
            $question_title = $question->getOriginal('title');

            $question->slug = \Str::slug($question_title);
        });
    }

    public $timestamps = false;
}
