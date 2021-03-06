<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function permission() {
        return $this->belongsToMany(permission::class,'permission_role','role_id','permission_id');
    }
}
