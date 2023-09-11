<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\CommonDicountRequest;
use App\Models\Admin\Market\CommonDiscount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function copan(){
        return view('admin.market.discount.copan');
    }

    public function copanCreate(){
        return view('admin.market.discount.copan-create');
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

    public function amazingSale(){
        return view('admin.market.discount.amazing');
    }

    public function amazingSaleCreate(){
        return view('admin.market.discount.amazing-create');
    }
}
