<?php

namespace App\Http\Controllers;

use App\Http\Requests\registerRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function userManager(){
        $users = User::all();
        
        return view('admin.user', compact('users'));
    }

    //............................................add.user............................................

    public function addUserManager(){
        return view('admin.addUser');
    }

    public function addUserStore(registerRequest $request){
        
        User::create([
            'fname' => $request['fname'],
            'lname' => $request['lname'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => $request['role'],
            'status' => $request['status']
        ]);

        return redirect()->route('UserController.userManager')->with('success', 'کاربر با موفقیت اضافه شد');
    }

    //............................................update.user............................................

    public function updateUserManager($id){
        $user = User::findOrFail($id);
        return view('admin.addUser', compact('user'));
    }

    public function updateUserStore(UpdateUserRequest $request, User $user){
        $user->update($request->validated());
        return redirect()->route('UserController.userManager')->with('success', 'کاربر با موفقیت ویرایش شد');
    }

    //............................................delete.user............................................

    public function deleteUserManager(Request $request){
        User::findOrFail($request->user_id)->delete();
        return redirect()->back();
    }

    //............................................login.user............................................

    public function loginPage(){
        return view('admin.login');
    }

    public function login(Request $request){
       $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ], [
            'email.required' => 'ایمیل یا نام کاربری الزامی است.',
            'email.email' => 'فرمت ایمیل معتبر نیست.',
            'password.required' => 'رمز عبور الزامی است.',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['message' => 'ایمیل یا رمز عبور اشتباه است'])->withInput();
        }

        if ($user->status === 'inactive') {
            return back()->withErrors(['message' => 'حساب کاربری شما غیرفعال است'])->withInput();
        }

        $remember = $request->filled('remember');
        Auth::login($user, $remember);
        $request->session()->regenerate();

        return redirect()->route('DashboardController.dashboard')->with('success', 'ورود با موفقیت انجام شد');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('UserController.loginPage');
    }
    
}
