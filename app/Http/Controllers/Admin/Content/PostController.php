<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Services\Image\ImageService;
use App\Models\Content\PostCategory;
use Illuminate\Http\Request;
use App\Models\Content\Post;
use App\Http\Requests\Admin\Content\PostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->simplePaginate(15);
        return view('admin.content.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $postCategories = PostCategory::all();
        return view('admin.content.post.create',compact('postCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request,ImageService $imageService)
    {
        $inputs = $request->all();

        $realTimestampStart = substr($request->published_at,0,10);
        $inputs['published_at'] = date("Y-m-d H:i:s",(int)$realTimestampStart);

        if ($request->has('image')){
            $imageService->setExclusiveDirectory('images'.DIRECTORY_SEPARATOR.'post');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result === false){
                return redirect()->route('admin.content.post.index')->with('swal-error','آپلود عکس با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }
        $inputs['author_id'] = 1;
        $post = Post::create($inputs);
        return redirect()->route('admin.content.post.index')->with('swal-success','پست شما با موفقیت ثبت شد');
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
