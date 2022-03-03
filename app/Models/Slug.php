<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slug extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'value'
    ];

    public function page() {
        return $this->hasOne(Page::class);
    }

    public function subpage() {
        return $this->hasOne(SubPage::class);
    }
}
