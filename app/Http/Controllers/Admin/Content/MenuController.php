<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\MenuRequest;
use App\Models\Admin\Content\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.content.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menus = Menu::all()->where('parent_id',null);
        return view('admin.content.menu.create',compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuRequest $request)
    {
        $inputs = $request->all();
        $menu = Menu::create($inputs);
        return redirect()->route('admin.content.menu.index')->with('swal-success', 'منوی جدید شما با موفقیت ثبت شد');
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
    public function edit(Menu $menu)
    {
        $parent_menus = Menu::all()->where('parent_id',null)->except($menu->id);
        return view('admin.content.menu.edit',compact('parent_menus','menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MenuRequest $request,Menu $menu)
    {
        $inputs = $request->all();
        $menu->update($inputs);
        return redirect()->route('admin.content.menu.index')->with('swal-success', 'منوی شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $result = $menu->delete();
        return redirect()->route('admin.content.menu.index')->with('swal-success','منو با موفقیت حذف شد');
    }
    public function status(Menu $menu){
        $menu->status = $menu->status == 0 ? 1 : 0;
        $result = $menu->save();
        if ($result){
            if ($menu->status == 0){
                return response()->json(['status' => true,'checked' => false]);
            }
            else{
                return response()->json(['status' => true,'checked' => true]);
            }
        }
        else{
            return response()->json([
                'status' => false
            ]);
        }
    }
}
