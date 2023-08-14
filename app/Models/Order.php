<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Product::class)->withTrashed();
    }

    public function newOrdersCount()
    {
        return $this->where('status', 0)->count();
    }

    public function inProgressOrdersCount()
    {
        return $this->whereBetween('status', [1, 4])->count();
    }

    public function status($statuses)
    {
        return $statuses[$this->status] ?? '';
    }
}
