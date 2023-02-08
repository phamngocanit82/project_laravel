<?php

namespace App\Http\Controllers\Admin\Product;
use App\Http\Requests\ProductGroupRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Helpers\Functions;
class ProductGroupController extends Controller
{
    public function index(){
        return view('admin.product_group.add', [
            'title' => 'Đăng Nhập Hệ Thống'
        ]);
    }
    public function add(){
        $page_view = 'admin.product_group.add';
        $title = 'Product Groups / Add';
        return view('admin.main', compact('page_view', 'title'));
    }
    public function postAdd(ProductGroupRequest $request){
        return response()->json(['status'=>'success']);
    }
    public function list(){
        $page_view = 'admin.product_group.list';
        $title = 'Product Groups / List';
        return view('admin.main', compact('page_view', 'title'));
    }
    public function store(Request $request)
    {
        dd($request->file('file_thumb')->isValid());
    }
}
