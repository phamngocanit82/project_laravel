<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        $page_type = 'admin_login';
        $title = 'Đăng Nhập Hệ Thống';

        return view('admin.user.login', compact('page_type', 'title'));
    }
    public function postLogin(){
        return view('admin.user.login', [
            'title' => 'Đăng Nhập Hệ Thống'
        ]);
    }
    public function forgot_password(){
        return view('admin.user.forgot_password', compact([
            'title' => 'Đăng Nhập Hệ Thống'
        ]));
    }
    public function recover_password(){
        return view('admin.user.recover_password', [
            'title' => 'Đăng Nhập Hệ Thống'
        ]);
    }
    
}
