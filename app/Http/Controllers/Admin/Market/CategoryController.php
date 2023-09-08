<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\PostCategoryRequest;
use App\Http\Requests\Admin\Market\ProductCategoryRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Admin\Content\PostCategory;
use App\Models\Admin\Market\ProductCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productCategories = ProductCategory::orderBy('created_at','desc')->simplePaginate(15);
        return view('admin.market.category.index',compact('productCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productCategories = ProductCategory::where('parent_id',null)->get();
        return view('admin.market.category.create',compact('productCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCategoryRequest $request,ImageService $imageService)
    {
        $inputs = $request->all();
        if ($request->hasFile('image')){
            $imageService->setExclusiveDirectory('images'.DIRECTORY_SEPARATOR.'product-category');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result === false){
                return redirect()->route('admin.market.category.index')->with('swal-error', 'آپلود عکس با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }
        $productCategory = ProductCategory::create($inputs);
        return redirect()->route('admin.market.category.index')->with('swal-success', 'دسته بندی جدید شما با موفقیت ثبت شد');
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
    public function edit(ProductCategory $productCategory)
    {
        $parent_categories = ProductCategory::where('parent_id',null)->get()->except($productCategory->id);
        return view('admin.market.category.edit',compact('productCategory','parent_categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductCategoryRequest $request,ProductCategory $productCategory,ImageService $imageService)
    {
        $inputs = $request->all();
        if ($request->hasFile('image')){
            if (!empty($productCategory->image)){
                $imageService->deleteDirectoryAndFiles($productCategory->image['directory']);
            }
            $imageService->setExclusiveDirectory('images'.DIRECTORY_SEPARATOR.'product-category');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result === false){
                return redirect()->route('admin.market.category.index')->with('swal-error', 'آپلود عکس با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }
        else{
            if (isset($inputs['currentImage']) && !empty($productCategory->image)){
                $image = $productCategory->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            }
        }
        $inputs['slug'] = null;
        $productCategory->update($inputs);
        return redirect()->route('admin.market.category.index')->with('swal-success','دسته بندی با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $productCategory)
    {
        $result = $productCategory->delete();
        return redirect()->route('admin.market.category.index')->with('swal-success','دسته بندی با موفقیت حذف شد');
    }
}
