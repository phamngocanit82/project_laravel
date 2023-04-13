<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WhyUsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\WhyUs;
class WhyUsController extends Controller
{
    private $why_us;
    const PAGE = 6;
    public function __construct(){
        $this->why_us = new WhyUs();
    }
    function displayViewAdd(){
        return [
            'page_view' => 'admin.why_us.add',
            'title' => 'Thêm tại sao là chúng tôi',
            'button_save' => 'Lưu tại sao là chúng tôi',
            'button_list' => 'Danh sách tại sao là chúng tôi',
            'button_list_href' => '/admin/why-us/list',
        ];   
    }
    function displayViewEdit(){
        return [
            'page_view' => 'admin.why_us.edit',
            'title' => 'Chỉnh sửa thông tin tại sao là chúng tôi',
            'button_add' => 'Thêm tại sao là chúng tôi',
            'button_add_href' => '/admin/why-us/add',
            'button_save' => 'Lưu tại sao là chúng tôi',
            'button_list' => 'Danh sách tại sao là chúng tôi',
            'button_list_href' => '/admin/why-us/list',
        ];
    }
    function displayViewList(){
        return [
            'page_view' => 'admin.why_us.list',
            'title' => 'Danh sách tại sao là chúng tôi',
            'search_view' => 'search',
            'button_add' => 'Thêm tại sao là chúng tôi',
            'button_add_href' => '/admin/why-us/add',
        ];
    }
    function setData(WhyUsRequest $request){
        return [
            'title' => $request->why_us_title,
            'sub_title' => $request->why_us_sub_title,
            'description' => $request->why_us_description,
            'active' => $request->why_us_active,
            'create_at' => date('Y-m-d H:i:s'),
            'update_at' => date('Y-m-d H:i:s'),
        ];
    }
    public function index(){
        return self::list();
    }
    public function add(){
        $display_view = self::displayViewAdd();
        return view('admin.main', compact('display_view'));
    }
    public function postAdd(WhyUsRequest $request){
        $data = self::setData($request);
        $this->why_us->insert($data);
        return response()->json(['status'=>'success']);
    }
    public function edit(Request $request, $id){
        $display_view = self::displayViewEdit();
        $why_us = $this->why_us->getId($id);
        if(!empty($id)){
            if(!empty($why_us[0])){
                $request->session()->put('id', $id);
                $why_us = $why_us[0];
            }else{
                return redirect()->route('admin.why_us.index')->with('msg', 'nhóm người sử dụng không tồn tại');
            }
        }else{
            return redirect()->route('admin.why_us.index')->with('msg', 'liên kết không tồn tại');
        }
        return view('admin.main', compact('display_view', 'why_us'));
    }
    public function postEdit(WhyUsRequest $request){
        $id = session('id');
        $data = self::setData($request);
        $this->why_us->updateId($id, $data);
        return response()->json(['status'=>'success']);
     }
    public function list(){
        $display_view = self::displayViewList();
        $num_page = self::PAGE;
        $why_us_list = $this->why_us->getPage(self::PAGE);
        if($why_us_list->currentPage()!=1){
            if(count($why_us_list)==0)
                return redirect('admin/why-us/list');
        }else{
            if(count($why_us_list)==0)
                return redirect('admin/why-us/add');
        }
        return view('admin.main', compact('display_view', 'why_us_list', 'num_page'));
    }
    public function active(Request $request){
        $data = [
                'active' => $request->why_us_active,
                'create_at' => date('Y-m-d H:i:s'),
                'update_at' => date('Y-m-d H:i:s'),
            ];
        $this->why_us->updateActiveId($request->id, $data);
        return response()->json(['status'=>'success']);
    }
    public function delete(Request $request){
        $result = $this->why_us->deleteId($request->id);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công danh mục'
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }
}
