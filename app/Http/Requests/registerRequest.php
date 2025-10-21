<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registerRequest extends FormRequest
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
            'fname' => 'required|string|max:50',
            'lname' => 'required|string|max:50',
            'username' => 'required|string|max:50|unique:users,username',
            'email' => 'required|email|max:50|unique:users,email',
            'password' => 'required|confirmed|min:8',
            'role' => 'required|string|max:20',
        ];
    }

    public function messages(): array
    {
        return [
            'fname.required' => 'نام کوچک را وارد کنید.',
            'fname.string' => 'نام کوچک باید متنی باشد.',
            'fname.max' => 'نام کوچک نمی‌تواند بیش از ۵۰ کاراکتر باشد.',

            'lname.required' => 'نام خانوادگی را وارد کنید.',
            'lname.string' => 'نام خانوادگی باید متنی باشد.',
            'lname.max' => 'نام خانوادگی نمی‌تواند بیش از ۵۰ کاراکتر باشد.',

            'username.required' => 'نام مستعار را وارد کنید.',
            'username.string' => 'نام مستعار باید متنی باشد.',
            'username.max' => 'نام مستعار نمی‌تواند بیش از ۵۰ کاراکتر باشد.',
            'username.unique' => 'نام مستعار قبلاً استفاده شده است.',
            
            'email.required' => 'ایمیل را وارد کنید.',
            'email.email' => 'فرمت ایمیل صحیح نیست.',
            'email.max' => 'ایمیل نمی‌تواند بیش از ۵۰ کاراکتر باشد.',
            'email.unique' => 'این ایمیل قبلاً ثبت شده است.',
            
            'password.required' => 'رمز عبور را وارد کنید.',
            'password.confirmed' => 'تأیید رمز عبور با رمز عبور مطابقت ندارد.',
            'password.min' => 'رمز عبور باید حداقل ۸ کاراکتر باشد.'
        ];
    }
}
