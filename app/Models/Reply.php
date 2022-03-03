<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;
    protected $fillable = [
        'comment_id',
        'user_id',
        'content',
    ];

    public function comment() {
        $this->belongsTo(Comment::class, 'comment_id');
    }

    public function user() {
        $this->belongsTo(User::class, 'user_id');
    }
}
