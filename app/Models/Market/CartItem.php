<?php

namespace App\Models\Market;

use App\Models\Admin\Market\Guarantee;
use App\Models\Admin\Market\Product;
use App\Models\Admin\Market\ProductColor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartItem extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = ['id'];
    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function guarantee(){
        return $this->belongsTo(Guarantee::class);
    }

    public function color(){
        return $this->belongsTo(ProductColor::class);
    }

    public function cartItemProductPrice(){
        $guaranteePriceIncrease = empty($this->guarantee_id) ? 0 : $this->guarantee->price_increase;
        $colorPriceIncrease = empty($this->color_id) ? 0 : $this->color->price_increase;
        return $this->product->price + $guaranteePriceIncrease + $colorPriceIncrease;
    }

    public function cartItemProductDiscount(){
        $cartItemProductPrice = $this->cartItemProductPrice();
        $productDiscount = empty($this->product->activeAmazingSales()) ? 0 : $cartItemProductPrice * ($this->product->activeAmazingSales()->percentage / 100);
        return $productDiscount;
    }

    public function cartItemFinalPrice(){
        $cartItemProductPrice = $this->cartItemProductPrice();
        $productDiscount = $this->cartItemProductDiscount();
        return $this->number * ($cartItemProductPrice - $productDiscount);
    }

    public function cartItemFinalDiscount(){
        $productDiscount = $this->cartItemProductDiscount();
        return $this->number * $productDiscount;
    }
}
