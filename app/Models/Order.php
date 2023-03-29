<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Order extends Model
{
    use HasFactory;
    
    
    function order_detail(){
        return $this->hasMany(OrderDetails::class);
    }
   
    protected function serializeDate(DateTimeInterface $date){
        return $date->format('Y-m-d h:i:s');
    }
}
