<?php

namespace App\Http\Requests\Customer\SalesProcess;

use Illuminate\Foundation\Http\FormRequest;

class ProfileCompletionRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'sometimes|required',
            'last_name' => 'sometimes|required',
            'mobile' => 'sometimes|required|unique:users,mobile|min:10|max:13',
            'email' => 'email|unique:users,email',
            'national_code' => 'sometimes|required',
        ];
    }
}
