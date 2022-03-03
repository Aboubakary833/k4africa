<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug_id',
        'title',
        'image'
    ];

    public function subpages() {return $this->hasMany(SubPage::class);}

    public function slug() {return $this->belongsTo(Slug::class, 'slug_id');}

    public function additonal_contents() {
        return $this->hasMany(AdditionalContent::class);
    }
}
