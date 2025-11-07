<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CaregoryRequest extends FormRequest
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
            'first'  => 'required|exists:categories,id|different:seconde|different:third|different:fourth',
            'seconde'=> 'required|exists:categories,id|different:first|different:third|different:fourth',
            'third'  => 'required|exists:categories,id|different:first|different:seconde|different:fourth',
            'fourth' => 'required|exists:categories,id|different:first|different:seconde|different:third'
        ];
    }

    public function messages(): array
    {
        return [
            'first.required'   => 'انتخاب اولین دسته‌بندی الزامی است.',
            'seconde.required' => 'انتخاب دومین دسته‌بندی الزامی است.',
            'third.required'   => 'انتخاب سومین دسته‌بندی الزامی است.',
            'fourth.required'  => 'انتخاب چهارمین دسته‌بندی الزامی است.',

            'first.exists'   => 'دسته‌بندی انتخاب شده معتبر نیست.',
            'seconde.exists' => 'دسته‌بندی انتخاب شده معتبر نیست.',
            'third.exists'   => 'دسته‌بندی انتخاب شده معتبر نیست.',
            'fourth.exists'  => 'دسته‌بندی انتخاب شده معتبر نیست.',

            'first.different'   => 'دسته‌بندی‌ها نباید تکراری باشند.',
            'seconde.different' => 'دسته‌بندی‌ها نباید تکراری باشند.',
            'third.different'   => 'دسته‌بندی‌ها نباید تکراری باشند.',
            'fourth.different'  => 'دسته‌بندی‌ها نباید تکراری باشند.'
        ];
    }
}
