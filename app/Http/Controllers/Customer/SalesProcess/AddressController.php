<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use App\Helpers\helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\SalesProcess\ChooseAddressAndDeliveryRequest;
use App\Http\Requests\Customer\SalesProcess\StoreAddressRequest;
use App\Http\Requests\Customer\SalesProcess\UpdateAddressRequest;
use App\Models\Admin\Market\Address;
use App\Models\Admin\Market\Delivery;
use App\Models\Admin\Market\Order;
use App\Models\City;
use App\Models\Market\CartItem;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;

class AddressController extends Controller
{
    public function addressAndDelivery(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application|RedirectResponse
    {
        $user = Auth::user();
        $provinces = Province::all();
        $cartItems = CartItem::where('user_id',$user->id)->get();
        $deliveryMethods = Delivery::query()->where('status',1)->get();
        if (empty(CartItem::query()->where('user_id',$user->id)->count())){
            return redirect()->route('customer.sales-process.cart');
        }
        return view('customer.sales-process.address-and-delivery',compact('cartItems','user','provinces','deliveryMethods'));
    }

    public function addAddress(StoreAddressRequest $request): RedirectResponse
    {
        $inputs = $request->all();
        $inputs['user_id'] = Auth::id();
        $inputs['postal_code'] = helper::convertPersianToEnglish($request->postal_code);
        Address::query()->create($inputs);
        return back();
    }

    public function getCities(Province $province): JsonResponse
    {
        $cities = $province->cities()->get();
        if ($cities != null){
            return response()->json(['status' => true,'cities' => $cities]);
        }
        else{
            return response()->json(['status' => false,'cities' => null]);
        }
    }

    public function updateAddress(Address $address,UpdateAddressRequest $request): RedirectResponse
    {
        $inputs = $request->all();
        $inputs['user_id'] = Auth::id();
        $address->update($inputs);
        return redirect()->back();
    }

    public function chooseAddressAndDelivery(ChooseAddressAndDeliveryRequest $request): RedirectResponse
    {
        $user = Auth::user();
        $inputs = $request->all();
        $inputs['user_id'] = $user->id;
        $order = Order::query()->updateOrCreate(['user_id' => $user->id,'order_status' => 0],$inputs);
        return redirect()->route('customer.sales-process.payment');
    }
}
