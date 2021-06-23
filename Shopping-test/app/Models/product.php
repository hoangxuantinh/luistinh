<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function images() {
        return $this->hasMany(product_image::Class,'product_id');
    }
    public function category() {
        return $this->belongsTo(category::class,'category_id');
    }
}
