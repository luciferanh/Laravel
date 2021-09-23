<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index(){
        return view('admin.users.login',[
            'title' => 'Đăng Nhập Hệ Thống'
        ]);
    }
    public function store(Request $request)
    {
        $mang = [
            'email' =>$request['email'],
            'password' => $request['password']
        ];
      #  dd(bcrypt($mang['password']));
        $is_true=Auth::attempt($mang); 
        if($is_true == true){

            return redirect()->route('admin');

        }
        $request->session()->flash('error', 'Email hoặc password không đúng');
        return redirect()->back();
    }
}
