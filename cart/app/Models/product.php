<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function images() {
        return $this->hasMany(product_image::class,'product_id');
    }
    public function tags()
    {
        return $this
            ->belongsToMany(tag::class, 'product_tags', 'product_id', 'tag_id')
            ->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    
}
