<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MediaRequest extends FormRequest
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
            'video'        => 'required',
            'first_poster'  => 'required|string',
            'second_poster' => 'required|string',
            'third_poster'  => 'required|string'
        ];
    }

    public function messages(): array
    {
        return [
            'video.required'         => 'لطفاً یک ویدیو را انتخاب کنید.',
            'first_poster.required'  => 'لطفاً پوستر اول را انتخاب کنید.',
            'first_poster.string'    => 'مقدار پوستر اول نامعتبر است.',
            'second_poster.required' => 'لطفاً پوستر دوم را انتخاب کنید.',
            'second_poster.string'   => 'مقدار پوستر دوم نامعتبر است.',
            'third_poster.required'  => 'لطفاً پوستر سوم را انتخاب کنید.',
            'third_poster.string'    => 'مقدار پوستر سوم نامعتبر است.'
        ];
    }
}
