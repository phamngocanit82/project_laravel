<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SectionAboutController extends Controller
{
    public function index(){
        return view('admin.section_about.add', [
            'title' => 'Đăng Nhập Hệ Thống'
        ]);
    }
    public function add(){
        $page_view = 'admin.section_about.add';
        $title = 'Section About / Add';
        return view('admin.main', compact('page_view', 'title'));
    }
    public function list(){
        $page_view = 'admin.section_about.list';
        $title = 'Section About / List';
        return view('admin.main', compact('page_view', 'title'));
    }
}
