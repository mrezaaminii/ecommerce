<?php

namespace App\Models\Admin\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryAttribute extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['name','type','unit','category_id'];
    public function category(){
        return $this->belongsTo(ProductCategory::class,'category_id');
    }

    public function values(){
        return $this->hasMany(CategoryValue::class,'category_attribute_id');
    }

    public function products()
    {
        return $this->hasOneThrough(Product::class, ProductCategory::class);
    }
}
