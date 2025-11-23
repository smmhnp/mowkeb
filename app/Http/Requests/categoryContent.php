<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class categoryContent extends FormRequest
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
            'name' => 'required|string|min:3|max:255',
            'slug' => 'required|string|min:3|max:255',
            'content' => 'required|string|min:10',
            'video' => 'required|exists:videos,id',
            'icon' => 'required|string|regex:/^fa[a-z-]+ fa-[a-z-]+$/'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'وارد کردن عنوان مطلب الزامی است.',
            'name.string' => 'عنوان باید به صورت متن باشد.',
            'name.min' => 'عنوان باید حداقل ۳ کاراکتر داشته باشد.',
            'name.max' => 'عنوان نمی‌تواند بیش از ۲۵۵ کاراکتر باشد.',
            
            'slug.required' => 'وارد کردن عنوان مطلب الزامی است.',
            'slug.string' => 'عنوان باید به صورت متن باشد.',
            'slug.min' => 'عنوان باید حداقل ۳ کاراکتر داشته باشد.',
            'slug.max' => 'عنوان نمی‌تواند بیش از ۲۵۵ کاراکتر باشد.',

            'content.required' => 'وارد کردن متن مطلب الزامی است.',
            'content.string' => 'متن مطلب باید به صورت متن باشد.',
            'content.min' => 'متن مطلب باید حداقل ۱۰ کاراکتر داشته باشد.',

            'video.required' => 'ویدیو الزامی است.',
            'video.exists' => 'ویدیوی انتخاب شده معتبر نیست.',

            'icon.regex' => 'فرمت آیکون باید به صورت: faxxx fa-xxx باشد (مثل: fa-solid fa-house)',
            'icon.required' => 'وارد کردن آیکون الزامی است.',
            'icon.string' => 'آیکون باید به صورت متن باشد.'
        ];
    }
}
