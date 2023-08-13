<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function scopeActive($query){
        return $query->where('is_active', 1);
    }

    public function isActive(){
        return $this->is_active === 1;
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function soldCount(){
        return $this->orders->count();
    }
}
