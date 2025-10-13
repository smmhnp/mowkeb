<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeSpecialRequest extends FormRequest
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
            'title' => 'required|string|min:20'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'متن خبر نمیتواند خالی باشد',
            'title.min' => 'متن خبر باید بیشتر از ۲۰ کاراکتر باشد'
        ];
    }
}
