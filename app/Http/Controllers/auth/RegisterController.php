<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }


    public function storeUser(Request $request) 
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:5|confirmed',
            'password_confirmation' => 'required',
            'usertype'  => 'required|string|max:5',
        ]);

        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'usertype'  => $request->usertype,
        ]);
        Toastr::success('Create new account successfully :)','Success');
        return redirect('dashboard');

    }

    

}
