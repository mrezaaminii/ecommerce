<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use App\Http\Controllers\Controller;
use App\Models\Admin\Market\Product;
use App\Models\Market\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function cart(){
        if (Auth::check()){
            $cartItems = CartItem::query()->where('user_id',auth()->id())->get();
            $relatedProducts = Product::all();
            return view('customer.sales-process.cart',compact('cartItems','relatedProducts'));
        }
        else{
            return redirect()->route('auth.customer.login-register-form');
        }
    }

    public function updateCart(){

    }

    public function addToCart(Product $product,Request $request){
        if (Auth::check()){
            Validator::make((array)$request,[
                'color' => 'nullable|exists:product_colors,id',
                'guarantee' => 'nullable|exists:guarantees,id',
                'number' => 'numeric|min:1|max:5'
            ]);
            $cartItems = CartItem::query()->where('product_id',$product->id)->where('user_id',auth()->id())->get();
            if (!isset($request->color)){
                $request->color = null;
            }

            if (!isset($request->guarantee)){
                $request->guarantee = null;
            }
            foreach ($cartItems as $cartItem){
                if ($cartItem->color_id == $request->color && $cartItem->guarantee_id == $request->guarantee){
                    if ($cartItem->number != $request->number){
                        $cartItem->update([
                            'number' => $request->number
                        ]);
                    }
                    return back();
                }
            }

            $inputs = [];
            $inputs['user_id'] = auth()->id();
            $inputs['product_id'] = $product->id;
            $inputs['color_id'] = $request->color;
            $inputs['guarantee_id'] = $request->guarantee;
            $inputs['number'] = $request->number;

            CartItem::query()->create($inputs);
            return back()->with('swal-success','محصول با موفقیت به سبد خرید اضافه شد');
        }
        else{
            return redirect()->route('auth.customer.login-register-form');
        }
    }

    public function removeFromCart(){

    }

}
