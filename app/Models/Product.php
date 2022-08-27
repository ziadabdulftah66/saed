<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [ 'product_number','product_name','category_id','section_id','brand_id','Cost_price','selling_price'];
    public function category(){
        return $this->belongsTo(category::class,'category_id');
    }
   public function section(){
        return $this->belongsTo(section::class,'section_id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }

}
