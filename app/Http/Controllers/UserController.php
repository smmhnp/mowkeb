<?php

namespace App\Http\Controllers;

use App\Http\Requests\registerRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

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
            'password' => $request['password'],
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
}
