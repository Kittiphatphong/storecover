<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    use HasFactory;


    public function orderItems(){
        return $this->hasMany(SellDetail::class,'sell_id');
    }

    public function payments(){
        return $this->hasOne(Payment::class,'sell_id');
    }


    public function customers(){
        return $this->belongsTo(User::class,"customer_id");
    }

    public function stores(){
        return $this->belongsTo(User::class,'store_id');
    }
}
