<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Collection extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'collection';

    protected $fillable = [
        'name',
        'subject_id',
        'slug'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['name', 'subject.slug'],
                'unique' => true,
                'onUpdate' => true
            ]
        ];
    }

    public static function boot()
    {
        parent::boot();

        static::updating(function ($collection) {
            $collection_name = $collection->getOriginal('name');
            $subject_slug = $collection->subject->slug;

            $collection->slug = \Str::slug($collection_name . ' ' . $subject_slug);
        });
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public $timestamps = false;
}
