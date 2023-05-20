<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function product_types(){
        return $this->belongsTo(ProductType::class,'product_type_id');
    }

    public function stores(){
        return $this->belongsTo(User::class,'store_id');
    }

    public function stocks(){
        return $this->hasMany(Stock::class,'product_id');
    }

    public function sellItems(){


        $allOrderItem = SellDetail::where('product_id',$this->id)->where('status','success')->sum('quantity');
        $stock = $allOrderItem;

        return $stock;
    }

    public function sumStocks(){

        $allStock = $this->hasMany(Stock::class,'product_id')->sum('amount');
        $allOrderItem = SellDetail::where('product_id',$this->id)->where('status','success')->sum('quantity');
        $stock = $allStock -$allOrderItem;

        return $stock;
    }


    public function totalSell(){
        $allOrderItems = SellDetail::where('product_id',$this->id)->where('status','success')->get();
        $total =  0;
        foreach ($allOrderItems as $orderItem){
            $total += ($orderItem->sell_price * $orderItem->quantity);
        }
        return $total;
    }

    public function balance(){
        $allOrderItems = SellDetail::where('product_id',$this->id)->where('status','success')->get();
        $total =  0;
        foreach ($allOrderItems as $orderItem){
            $total += ($orderItem->cost_price * $orderItem->quantity);
        }
        return $total;
    }
}
