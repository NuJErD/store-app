<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
        public $timestamps = false;
         protected $fillable = [
      'name','festival','price','brand','size','chest','lenght','color','picture'
   ];
}


