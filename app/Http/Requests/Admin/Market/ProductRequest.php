<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
                'name' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9۰-۹\ِِِِِِِِِِِِِِِء-ي., ]+$/u',
                'introduction' => 'required|max:1000|min:5',
                'weight' => 'required|between:0,99.99|regex:/^[0-9۰-۹. ]+$/u',
                'length' => 'required|between:0,99.99|regex:/^[0-9۰-۹. ]+$/u',
                'width' => 'required|between:0,99.99|regex:/^[0-9۰-۹. ]+$/u',
                'height' => 'required|between:0,99.99|regex:/^[0-9۰-۹. ]+$/u',
                'price' => 'required|between:0,99.99|regex:/^[0-9۰-۹. ]+$/u',
                'image' => 'required|image|mimes:png,jpg,jpeg,gif',
                'status' => 'required|numeric|in:0,1',
                'marketable' => 'required|numeric|in:0,1',
                'tags' => 'required|regex:/^[ا-یa-zA-Z0-9\ِِِِِِِِِِِِِِِء-ي., ]+$/u',
                'category_id' => 'required|min:1|regex:/^[0-9ِِِِِِِِِِِِِِِ]+$/u|exists:product_categories,id',
                'brand_id' => 'required|min:1|regex:/^[0-9ِِِِِِِِِِِِِِِ]+$/u|exists:brands,id',
                'published_at' => 'required|numeric',
                'meta_key.*' => 'required',
                'meta_value.*' => 'required',
            ];
        }
        else{
            return [
                'name' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9۰-۹\ِِِِِِِِِِِِِِِء-ي., ]+$/u',
                'introduction' => 'required|max:1000|min:5',
                'weight' => 'required|numeric|min:1',
                'length' => 'required|numeric|min:1',
                'width' => 'required|numeric|min:1',
                'height' => 'required|numeric|min:1',
                'price' => 'required|numeric',
                'image' => 'image|mimes:png,jpg,jpeg,gif',
                'status' => 'required|numeric|in:0,1',
                'marketable' => 'required|numeric|in:0,1',
                'tags' => 'required|regex:/^[ا-یa-zA-Z0-9\ِِِِِِِِِِِِِِِء-ي., ]+$/u',
                'category_id' => 'required|min:1|regex:/^[0-9ِِِِِِِِِِِِِِِ]+$/u|exists:product_categories,id',
                'brand_id' => 'required|min:1|regex:/^[0-9ِِِِِِِِِِِِِِِ]+$/u|exists:brands,id',
                'published_at' => 'required|numeric',
                'meta_key.*' => 'required',
                'meta_value.*' => 'required',
            ];
        }
    }

    public function attributes()
    {
        return [
          'meta_key.*' => 'ویژگی محصول',
          'meta_value.*' => 'مقدار ویژگی محصول',
        ];
    }
}
