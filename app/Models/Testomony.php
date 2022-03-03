<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testomony extends Model
{
    use HasFactory;
    protected $fillable = [
        'author',
        'author_image',
        'author_work',
        'author_rate',
        'content'
    ];
}
