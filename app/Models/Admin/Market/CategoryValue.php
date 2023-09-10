<?php

namespace App\Models\Admin\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryValue extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['product_id','type','value','category_attribute_id'];
    public function attribute(){
        return $this->belongsTo(CategoryAttribute::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
