<?php

namespace App\Models\Admin\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'product_images';
    protected $casts = ['image' => 'array'];
    protected $fillable = ['image','product_id'];
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
