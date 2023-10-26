<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Session as CheckLogin;
use App\Http\Requests\RegisterAuthRequest;
use App\Http\Requests\LoginAuthRequest;

class AuthController extends Controller
{
    function login(){
        return view('admin.auth.login');    
    }
    function checkLogin(LoginAuthRequest $request) {
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        try {
            $user = User::where('email',$request->email)->first();
            if ($user) {
                $check = CheckLogin::where('user_id', $user->id)->first();
                if ($check) {
                    $check->delete();
                }
            }
            Auth::attempt($arr);
            return redirect()->route('categories.index')->with('success','Đăng nhập thành công');
        }catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return back()->with('error','Đăng nhập không thành công. Vui lòng thử lại!');
        }
    }
    public function logout(Request $request)
    {
        // Xóa Session login, đưa người dùng về trạng thái chưa đăng nhập
        try {
            Auth::logout();
            return redirect()->route('auth.login')->with('success','Đăng xuất thành công');
        }catch (\Exception $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return back()->with('error','Đăng xuất không thành công. Vui lòng thử lại!');
        }
    }
}