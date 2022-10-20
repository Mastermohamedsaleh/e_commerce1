<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use App\Models\Category;

class Prodect extends Model
{
    use HasFactory;


    
    protected $guarded = [];
    
    
 public function Category(){
    return $this->belongsTo(Category::class,'Category_id');
 }

}
