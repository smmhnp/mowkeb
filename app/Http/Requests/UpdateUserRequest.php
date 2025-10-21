<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        $id = $this->route('user')->id; // چون توی route اسم پارامتر user بود

        return [
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'role' => 'required|string|in:user,editor,admin,super_admin',
            'status' => 'required|string|in:active,inactive'
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
            'email.unique' => 'این ایمیل قبلاً ثبت شده است.'
        ];
    }
}
