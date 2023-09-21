<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Admin\Market\Guarantee;
use App\Models\Admin\Market\Product;
use Illuminate\Http\Request;

class GuaranteeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product)
    {
        return view('admin.market.product.guarantee.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product)
    {
        return view('admin.market.product.guarantee.create',compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|min:2|max:120|regex:/^[ا-یa-zA-Z0-9\ِِِِِِِِِِِِِِِء-ي., ]+$/u',
            'price_increase' => 'required|numeric'
        ]);
        $inputs = $request->all();
        $inputs['product_id'] = $product->id;
        Guarantee::query()->create($inputs);
        return redirect()->route('admin.market.guarantee.index',$product->id)->with('swal-success','گارانتی با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product,Guarantee $guarantee)
    {
        $result = $guarantee->delete();
        return redirect()->route('admin.market.guarantee.index',$product->id)->with('swal-success','گارانتی با موفقیت حذف شد');
    }
}
