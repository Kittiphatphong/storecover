<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;
    public function slide($request){
        $this->title = $request->title;
        $this->content = $request->content;
    }
}
