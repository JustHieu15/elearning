<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionQuestion extends Model
{
    use HasFactory;

    protected $table = 'collection_question';

    protected $fillable = [
        'collection_id',
        'question_id',
    ];

    public $timestamps = false;
}
