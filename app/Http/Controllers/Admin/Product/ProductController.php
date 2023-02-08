<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index(){
        return view('admin.product.add', [
            'title' => 'Đăng Nhập Hệ Thống'
        ]);
    }
    public function add(){
        $page_view = 'admin.product.add';
        $title = 'Products / Add';
        return view('admin.main', compact('page_view', 'title'));
    }
    public function list(){
        $page_view = 'admin.product.list';
        $title = 'Products / List';
        return view('admin.main', compact('page_view', 'title'));
    }
}
