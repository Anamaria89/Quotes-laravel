<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
     protected $fillable = ['category_id', 'text', 'author'];
     
     public function category(){
        
        return $this->belongsTo(Category::class);
    }
}
