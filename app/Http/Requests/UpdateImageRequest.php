<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateImageRequest extends FormRequest
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
        $imageRule = 'image|mimes:jpeg,png,jpg,gif,webp|max:5120';

        if ($this->routeIs('MedaiControler.UpdateImageStore')) {
            $imageRule = 'nullable|' . $imageRule;
        } else {
            $imageRule = 'required|' . $imageRule;
        }

        return [
            'image' => $imageRule,
            'name' => 'required|string|max:255',
            'alt' => 'required|string|max:255',
            'description' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'image.required' => 'لطفاً یک فایل تصویر انتخاب کنید.',
            'image.image' => 'فایل انتخاب شده باید تصویر باشد.',
            'image.mimes' => 'فرمت تصویر باید یکی از jpeg، png، jpg، gif یا webp باشد.',
            'image.max' => 'حجم تصویر نباید بیشتر از 5 مگابایت باشد.',
            'name.required' => 'لطفاً نام تصویر را وارد کنید.',
            'alt.required' => 'لطفاً متن جایگزین را وارد کنید.',
            'description.required' => 'توضیحات تصویر نباید خالی باشد.'
        ];
    }
}
