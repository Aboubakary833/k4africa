<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalContent extends Model
{
    use HasFactory;
    protected $fillable = [
        'page_id',
        'name',
        'content'
    ];

    public function page() {
        return $this->belongsTo(Page::class, 'page_id');
    }
}
