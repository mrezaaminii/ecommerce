<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class StoreRequest extends FormRequest
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
        if ($this->isMethod('post')){
        return [
            'receiver' => 'required|max:120|min:1|regex:/^[ا-یa-zA-Z0-9\ِِِِِِِِِِِِِِِء-ي., ]+$/u',
            'deliverer' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\ِِِِِِِِِِِِِِِء-ي., ]+$/u',
            'marketable_number' => 'required|numeric',
            'description' => 'required|max:1000|min:2|regex:/^[ا-یa-zA-Z0-9\ِِِِِِِِِِِِِِِء-ي., ]+$/u',
        ];
        }
        else{
            return [
                'frozen_number' => 'required|numeric',
                'sold_number' => 'required|numeric',
                'marketable_number' => 'required|numeric',
            ];
        }
    }
}
