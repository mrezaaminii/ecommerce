<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\AmazingSaleRequest;
use App\Http\Requests\Admin\Market\CommonDicountRequest;
use App\Http\Requests\Admin\Market\CopanRequest;
use App\Models\Admin\Market\AmazingSale;
use App\Models\Admin\Market\CommonDiscount;
use App\Models\Admin\Market\Copan;
use App\Models\Admin\Market\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function copan(){
        $copans = Copan::all();
        return view('admin.market.discount.copan',compact('copans'));
    }

    public function copanCreate(){
        $users = User::all();
        return view('admin.market.discount.copan-create',compact('users'));
    }

    public function copanStore(CopanRequest $request){
        $inputs = $request->all();
        $realTimestampStart = substr($request->start_date,0,10);
        $inputs['start_date'] = date("Y-m-d H:i:s",(int)$realTimestampStart);
        $realTimestampEnd = substr($request->end_date,0,10);
        $inputs['end_date'] = date("Y-m-d H:i:s",(int)$realTimestampEnd);
        if ($inputs['type'] == 0){
            $inputs['user_id'] = null;
        }
        $result = Copan::create($inputs);
        return redirect()->route('admin.market.discount.copan')->with('swal-success', 'کد تخفیف با موفقیت ثبت شد');
    }

    public function copanEdit(Copan $copan){
        $users = User::all();
        return view('admin.market.discount.copan-edit',compact('copan','users'));
    }

    public function copanUpdate(CopanRequest $request,Copan $copan){
        $inputs = $request->all();
        $realTimestampStart = substr($request->start_date,0,10);
        $inputs['start_date'] = date("Y-m-d H:i:s",(int)$realTimestampStart);
        $realTimestampEnd = substr($request->end_date,0,10);
        $inputs['end_date'] = date("Y-m-d H:i:s",(int)$realTimestampEnd);
        if ($inputs['type'] == 0){
            $inputs['user_id'] = null;
        }
        $result = $copan->update($inputs);
        return redirect()->route('admin.market.discount.copan')->with('swal-success', 'کد تخفیف با موفقیت ویرایش شد');
    }

    public function copanDestroy(Copan $copan){
        $result = $copan->delete();
        return redirect()->route('admin.market.discount.copan')->with('swal-success', 'کد تخفیف با موفقیت حذف شد');
    }

    public function commonDiscount(){
        $commonDiscounts = CommonDiscount::all();
        return view('admin.market.discount.common',compact('commonDiscounts'));
    }

    public function commonDiscountCreate(){
        return view('admin.market.discount.common-create');
    }

    public function commonDiscountStore(CommonDicountRequest $request){
        $inputs = $request->all();
        $realTimestampStart = substr($request->start_date,0,10);
        $inputs['start_date'] = date("Y-m-d H:i:s",(int)$realTimestampStart);
        $realTimestampEnd = substr($request->end_date,0,10);
        $inputs['end_date'] = date("Y-m-d H:i:s",(int)$realTimestampEnd);
        $result = CommonDiscount::create($inputs);
        return redirect()->route('admin.market.discount.commonDiscount')->with('swal-success', 'تخفیف عمومی با موفقیت ثبت شد');
    }

    public function commonDiscountEdit(CommonDiscount $commonDiscount){
        return view('admin.market.discount.common-edit',compact('commonDiscount'));
    }

    public function commonDiscountUpdate(CommonDiscount $commonDiscount,CommonDicountRequest $request){
        $inputs = $request->all();
        $realTimestampStart = substr($request->start_date,0,10);
        $inputs['start_date'] = date("Y-m-d H:i:s",(int)$realTimestampStart);
        $realTimestampEnd = substr($request->end_date,0,10);
        $inputs['end_date'] = date("Y-m-d H:i:s",(int)$realTimestampEnd);
        $commonDiscount->update($inputs);
        return redirect()->route('admin.market.discount.commonDiscount')->with('swal-success', 'تخفیف عمومی با موفقیت ویرایش شد');
    }

    public function commonDiscountDestroy(CommonDiscount $commonDiscount){
        $result = $commonDiscount->delete();
        return redirect()->route('admin.market.discount.commonDiscount')->with('swal-success', 'تخفیف عمومی با موفقیت حذف شد');
    }

    public function amazingSale(){
        $amazingSales = AmazingSale::all();
        return view('admin.market.discount.amazing',compact('amazingSales'));
    }

    public function amazingSaleCreate(){
        $products = Product::all();
        return view('admin.market.discount.amazing-create',compact('products'));
    }

    public function amazingSaleStore(AmazingSaleRequest $request){
        $inputs = $request->all();
        $realTimestampStart = substr($request->start_date,0,10);
        $inputs['start_date'] = date("Y-m-d H:i:s",(int)$realTimestampStart);
        $realTimestampEnd = substr($request->end_date,0,10);
        $inputs['end_date'] = date("Y-m-d H:i:s",(int)$realTimestampEnd);
        $result = AmazingSale::create($inputs);
        return redirect()->route('admin.market.discount.amazingSale')->with('swal-success', 'فروش شگفت انگیز با موفقیت ثبت شد');
    }

    public function amazingSaleEdit(AmazingSale $amazingSale){
        $products = Product::all();
        return view('admin.market.discount.amazing-edit',compact('amazingSale','products'));
    }

    public function amazingSaleUpdate(AmazingSaleRequest $request,AmazingSale $amazingSale){
        $inputs = $request->all();
        $realTimestampStart = substr($request->start_date,0,10);
        $inputs['start_date'] = date("Y-m-d H:i:s",(int)$realTimestampStart);
        $realTimestampEnd = substr($request->end_date,0,10);
        $inputs['end_date'] = date("Y-m-d H:i:s",(int)$realTimestampEnd);
        $amazingSale->update($inputs);
        return redirect()->route('admin.market.discount.amazingSale')->with('swal-success', 'فروش شگفت انگیز با موفقیت ویرایش شد');
    }

    public function amazingSaleDestroy(AmazingSale $amazingSale){
        $result = $amazingSale->delete();
        return redirect()->route('admin.market.discount.amazingSale')->with('swal-success', 'فروش شگفت انگیز با موفقیت حذف شد');
    }
}
