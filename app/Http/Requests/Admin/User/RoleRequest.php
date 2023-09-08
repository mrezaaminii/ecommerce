<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class RoleRequest extends FormRequest
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
        $route = Route::current();
        if ($route->getName() == 'admin.user.role.store'){
            return [
                'name' => 'required|max:120|min:1|regex:/^[ا-یa-zA-Zِِِِِِِِِِِِِِِء-ي ]+$/u',
                'description' => 'required|max:300|min:1|regex:/^[ا-یa-zA-Zِِِِِِِِِِِِِِِء-ي ]+$/u',
                'permissions.*' => 'exists:permissions,id',
            ];
        }

    }
    public function attributes(): array
    {
        return [
            'name' => 'عنوان نقش',
            'description' => 'توضیحات نقش',
            'permissions.*' => 'دسترسی'
        ];
    }
}
