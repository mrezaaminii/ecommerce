<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class DeliveryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\ِِِِِِِِِِِِِِِء-ي., ]+$/u',
            'amount' => 'required|numeric',
            'delivery_time' => 'required|numeric',
            'delivery_time_unit' => 'required|regex:/^[ا-یa-zA-Z0-9\ِِِِِِِِِِِِِِِء-ي., ]+$/u',
        ];
    }

    public function attributes()
    {
        return [
          'amount' => 'هزینه',
          'delivery_time' => 'زمان ارسال',
          'delivery_time_unit' => 'واحد زمان ارسال'
        ];
    }
}
