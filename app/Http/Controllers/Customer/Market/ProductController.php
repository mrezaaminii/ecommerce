<?php

namespace App\Http\Controllers\Customer\Market;

use App\Http\Controllers\Controller;
use App\Models\Admin\Content\Comment;
use App\Models\Admin\Market\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function product(Product $product){
        $relatedProducts = Product::all()->except($product->id);
        return view('customer.market.product.product',compact('product','relatedProducts'));
    }

    public function addComment(Product $product,Request $request){
        Validator::make((array)$request,[
            'body' => 'required',
        ]);

        $inputs = $request->all();
        $inputs['body'] = str_replace(PHP_EOL,'<br/>',$request->body);
        $inputs['author_id'] = Auth::user()->id;
        $inputs['commentable_id'] = $product->id;
        $inputs['commentable_type'] = Product::class;
        Comment::query()->create($inputs);
        return back();

    }

    public function addToFavorite(Product $product){
        if (Auth::check()){
            $product->user()->toggle([Auth::user()->id]);
            if ($product->user->contains(Auth::user()->id)){
                return response()->json([
                    'status' => 1
                ]);
            }
            else{
                return response()->json([
                    'status' => 2
                ]);
            }
        }
        else{
            return response()->json([
               'status' => 3
            ]);
        }
    }

}
