<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'title' => 'required|string|min:3|max:255',
            'category' => 'required|exists:categories,id',
            'content' => 'required|string|min:10',
            'summary' => 'required|string|max:200',
            'tag' => 'required|string|max:255',
            'status' => 'required|in:allow,unauthorized',
            'video' => 'required|exists:videos,id',
            'cover' => 'required|string|max:255',
            'images' => 'required|array',
            'images.*' => 'exists:images,id'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'وارد کردن عنوان مطلب الزامی است.',
            'title.string' => 'عنوان باید به صورت متن باشد.',
            'title.min' => 'عنوان باید حداقل ۳ کاراکتر داشته باشد.',
            'title.max' => 'عنوان نمی‌تواند بیش از ۲۵۵ کاراکتر باشد.',

            'category.required' => 'لطفاً دسته‌بندی را انتخاب کنید.',
            'category.exists' => 'دسته‌بندی انتخاب شده معتبر نیست.',

            'content.required' => 'وارد کردن متن مطلب الزامی است.',
            'content.string' => 'متن مطلب باید به صورت متن باشد.',
            'content.min' => 'متن مطلب باید حداقل ۱۰ کاراکتر داشته باشد.',

            'summary.required' => 'خلاصه مطلب الزامی است.',
            'summary.string' => 'خلاصه مطلب باید به صورت متن باشد.',
            'summary.max' => 'خلاصه مطلب نمی‌تواند بیش از ۲۰۰ کاراکتر باشد.',

            'tag.required' => 'لطفاً کلمات کلیدی را وارد کنید.',
            'tag.string' => 'کلمات کلیدی باید به صورت متن باشند.',
            'tag.max' => 'کلمات کلیدی نمی‌تواند بیش از ۲۵۵ کاراکتر باشد.',

            'status.required' => 'وضعیت مطلب را مشخص کنید.',
            'status.in' => 'وضعیت انتخاب شده معتبر نیست.',

            'video.required' => 'ویدیو الزامی است.',
            'video.exists' => 'ویدیوی انتخاب شده معتبر نیست.',

            'cover.required' => 'تصویر اصلی مطلب الزامی است.',
            'cover.string' => 'تصویر اصلی باید به صورت متن باشد.',
            'cover.max' => 'آدرس تصویر اصلی نمی‌تواند بیش از ۲۵۵ کاراکتر باشد.',

            'images.required' => 'حداقل یک تصویر باید انتخاب شود.',
            'images.array' => 'فرمت تصاویر نامعتبر است.',
            'images.*.exists' => 'یکی از تصاویر انتخاب شده معتبر نیست.'
        ];
    }
}
