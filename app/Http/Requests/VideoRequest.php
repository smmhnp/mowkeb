<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'link' => [
                'required',
                'url',
                'unique:videos,link',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/^https:\/\/www\.aparat\.com\/embed\/[a-zA-Z0-9]+/', $value)) {
                        $fail('لینک آپارات معتبر نیست.');
                    }
                }
            ],
            'aparatID' => 'required|string|max:50|unique:videos,aparatID',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'نام ویدیو الزامی است.',
            'name.max' => 'نام ویدیو نباید بیشتر از 255 کاراکتر باشد.',
            'link.required' => 'لینک ویدیو الزامی است.',
            'link.url' => 'لینک وارد شده معتبر نیست.',
            'aparatID.required' => 'شناسه آپارات الزامی است.',
            'aparatID.max' => 'شناسه آپارات طولانی است.',
            'aparatID.unique' => 'این شناسه آپارات قبلا ثبت شده است.',
            'link.unique' => 'این لینک قبلا ثبت شده است.'
        ];
    }
}
