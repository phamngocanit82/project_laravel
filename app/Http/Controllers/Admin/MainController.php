<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $page_view = '';
        $title = 'Admin page';
        return view('admin.main', compact('page_view', 'title'));
    }
}
