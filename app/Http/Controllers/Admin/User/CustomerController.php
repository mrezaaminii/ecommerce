<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\AdminUserRequest;
use App\Http\Requests\Admin\User\CustomerRequest;
use App\Http\Services\Image\ImageService;
use App\Models\User;
use App\Notifications\NewUserRegistered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('user_type',0)->get();
        return view('admin.user.customer.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerRequest $request,ImageService $imageService)
    {
        $inputs = $request->all();
        if ($request->hasFile('profile_photo_path')){
            $imageService->setExclusiveDirectory('images'.DIRECTORY_SEPARATOR.'users');
            $result = $imageService->save($request->file('profile_photo_path'));
            if ($result === false){
                return redirect()->route('admin.user.customer.index')->with('swal-error', 'آپلود عکس با خطا مواجه شد');
            }
            $inputs['profile_photo_path'] = $result;
        }
        $inputs['user_type'] = 0;
        $inputs['password'] = Hash::make($request->password);
        $user = User::create($inputs);
        $details = [
            'message' => 'یک کاربر جدید در سیستم ثبت نام کرد'
        ];
        $adminUser = User::find(1);
        $adminUser->notify(new NewUserRegistered($details));
        return redirect()->route('admin.user.customer.index')->with('swal-success', 'مشتری جدید با موفقیت ثبت شد');
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
    public function edit(User $user)
    {
        return view('admin.user.customer.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerRequest $request,User $user,ImageService $imageService)
    {
        $inputs = $request->all();
        if ($request->hasFile('profile_photo_path')){
            if (!empty($user->profile_photo_path)){
                $imageService->deleteImage($user->profile_photo_path);
            }
            $imageService->setExclusiveDirectory('images'.DIRECTORY_SEPARATOR.'users');
            $result = $imageService->save($request->file('profile_photo_path'));
            if ($result === false){
                return redirect()->route('admin.user.customer.index')->with('swal-error', 'آپلود عکس با خطا مواجه شد');
            }
            $inputs['profile_photo_path'] = $result;
        }
        $user->update($inputs);
        return redirect()->route('admin.user.customer.index')->with('swal-success','مشتری سایت با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $result = $user->forceDelete();
        return redirect()->route('admin.user.customer.index')->with('swal-success','مشتری سایت با موفقیت حذف شد');
    }

    public function status(User $user){
        $user->status = $user->status == 0 ? 1 : 0;
        $result = $user->save();
        if ($result){
            if ($user->status == 0){
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

    public function activation(User $user){
        $user->activation = $user->activation == 0 ? 1 : 0;
        $result = $user->save();
        if ($result){
            if ($user->activation == 0){
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
