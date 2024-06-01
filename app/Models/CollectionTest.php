<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionTest extends Model
{
    use HasFactory;

    protected $table = 'collection_test';

    protected $fillable = [
        'collection_id',
        'test_id',
    ];

    public $timestamps = false;
}
