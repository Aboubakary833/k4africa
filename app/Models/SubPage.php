<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'page_id',
        'slug_id',
        'title',
        'content',
    ];

    public function page() {
        return $this->belongsTo(Page::class, 'page_id');
    }

    public function slug() {
        return $this->belongsTo(Slug::class, 'slug_id');
    }
}
