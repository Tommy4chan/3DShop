<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function scopeActive($query){
        return $query->where('is_active', 1);
    }

    public function isActive(){
        return $this->is_active === 1;
    }
}
