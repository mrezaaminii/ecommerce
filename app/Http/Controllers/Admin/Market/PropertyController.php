<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\CategoryAttributeRequest;
use App\Models\Admin\Market\CategoryAttribute;
use App\Models\Admin\Market\ProductCategory;
use Illuminate\Http\Request;

class PropertyController extends Controller
{

    public function index()
    {
        $category_attributes = CategoryAttribute::all();
        return view('admin.market.property.index', compact('category_attributes'));
    }

    public function create()
    {
        $productCategories = ProductCategory::all();
        return view('admin.market.property.create', compact('productCategories'));
    }

    public function store(CategoryAttributeRequest $request)
    {
        $inputs = $request->all();
        $attribute = CategoryAttribute::create($inputs);
        return redirect()->route('admin.market.property.index')->with('swal-success', 'فرم جدید شما با موفقیت ثبت شد');
    }

    public function show($id)
    {
        //
    }

    public function edit(CategoryAttribute $categoryAttribute)
    {
        $productCategories = ProductCategory::all();
        return view('admin.market.property.edit', compact('categoryAttribute', 'productCategories'));
    }


    public function update(CategoryAttributeRequest $request, CategoryAttribute $categoryAttribute)
    {
        $inputs = $request->all();
        $categoryAttribute->update($inputs);
        return redirect()->route('admin.market.property.index')->with('swal-success', 'فرم شما با موفقیت ویرایش شد');
    }

    public function destroy(CategoryAttribute $categoryAttribute)
    {
        $result = $categoryAttribute->delete();
        return redirect()->route('admin.market.property.index')->with('swal-success', 'فرم شما با موفقیت حذف شد');
    }
}
