<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug_id',
        'content'
    ];

    public function slug() {
        return $this->belongsTo(Slug::class, 'slug_id');
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
