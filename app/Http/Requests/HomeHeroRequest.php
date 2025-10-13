<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeHeroRequest extends FormRequest
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
            'title' => 'required|string|max:100',
            'subTitle' => 'required|string|min:30',
            'btnText' => 'required|string|max:20',
            'photo' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'لطفاً عنوان اصلی را وارد کنید.',
            'title.max' => 'عنوان اصلی نباید بیشتر از 100 کاراکتر باشد.',
            'subTitle.required' => 'لطفاً زیر عنوان را وارد کنید.',
            'subTitle.min' => 'زیر عنوان نباید کمکتر از 30 کاراکتر باشد',
            'photo.required' => 'تصویر را انتخاب کنید',
        ];
    }
}
