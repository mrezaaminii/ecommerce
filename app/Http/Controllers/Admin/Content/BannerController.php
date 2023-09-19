<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\BannerRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Admin\Content\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::orderBy('created_at','desc')->simplePaginate(15);
        return view('admin.content.banner.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.content.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BannerRequest $request,ImageService $imageService)
    {
        $inputs = $request->all();
        if ($request->hasFile('image')){
            $imageService->setExclusiveDirectory('images'. DIRECTORY_SEPARATOR . 'banner');
            $result = $imageService->createIndexAndSave($request->file('image'));
        }
        if ($result === false){
            return redirect()->route('admin.content.banner.index')->with('swal-success','آپلود تصویر با خطا مواجه شد');
        }
        $inputs['image'] = $result;
        $banner = Banner::create($inputs);
        return redirect()->route('admin.content.banner.index')->with('swal-success','بنر با موفقیت ثبت شد');
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
    public function destroy(string $id)
    {
        //
    }
}
