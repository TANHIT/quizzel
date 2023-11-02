<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
class LoginController extends Controller
{
    public function logingoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googlehandle()
    {
        try {
            $user = Socialite::driver('google')->user();
    
            // Kiểm tra xem người dùng đã đăng nhập chưa
            $existingUser = User::where('email', $user->email)->first();
    
            if ($existingUser) {
                // Nếu tài khoản Google đã được liên kết với tài khoản người dùng, đăng nhập người dùng và chuyển họ đến trang nào đó.
                auth()->login($existingUser);
                return redirect()->route('home'); // Thay 'home' bằng route mà bạn muốn chuyển hướng sau khi đăng nhập.
            } else {
                // Nếu tài khoản Google chưa liên kết với tài khoản người dùng, tạo một tài khoản mới.
                $newUser = new User();
                $newUser->name = $user->name;
                $newUser->email = $user->email;
                $newUser->password = bcrypt(Str::random(16)); // Tạo mật khẩu ngẫu nhiên (bạn có thể thay đổi cách tạo mật khẩu).
                // $newUser->password = 123456;
                $newUser->save();
    
                // Đăng nhập tài khoản mới được tạo
                auth()->login($newUser);
    
                return redirect()->route('home');
 // Chuyển hướng sau khi đăng nhập.
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    
}