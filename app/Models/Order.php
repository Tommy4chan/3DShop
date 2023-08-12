<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function status()
    {
        switch($this->status){
             case '0':
                return 'Нова';
                break;
             case '1':
                return 'Обробляється';
                break;
            case '2':
                return 'Готова до доставки';
                break;
            case '3':
                return 'Доставляється';
                break;
            case '4':
                return 'Доставлено';
                break;    
            case '5':
                return 'Завершена';
                break; 
            default:     
                return 'Скасована';
        }
    }
}
