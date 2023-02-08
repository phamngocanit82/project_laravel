<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function index(){
        return view('client.contact', [
            'title' => 'Đăng Nhập Hệ Thống'
        ]);
    }
}
