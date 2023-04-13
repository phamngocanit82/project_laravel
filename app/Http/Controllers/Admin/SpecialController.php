<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SpecialRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Special;
class SpecialController extends Controller
{
    private $special;
    const PAGE = 6;
    public function __construct(){
        $this->special = new Special();
    }
    function displayViewAdd(){
        return [
            'page_view' => 'admin.special.add',
            'title' => 'Thêm chương trình đặc biệt',
            'button_save' => 'Lưu chương trình đặc biệt',
            'button_list' => 'Danh sách chương trình đặc biệt',
            'button_list_href' => '/admin/special/list',
        ];   
    }
    function displayViewEdit(){
        return [
            'page_view' => 'admin.special.edit',
            'title' => 'Chỉnh sửa thông tin chương trình đặc biệt',
            'button_add' => 'Thêm chương trình đặc biệt',
            'button_add_href' => '/admin/special/add',
            'button_save' => 'Lưu chương trình đặc biệt',
            'button_list' => 'Danh sách chương trình đặc biệt',
            'button_list_href' => '/admin/special/list',
        ];
    }
    function displayViewList(){
        return [
            'page_view' => 'admin.special.list',
            'title' => 'Danh sách chương trình đặc biệt',
            'search_view' => 'search',
            'button_add' => 'Thêm chương trình đặc biệt',
            'button_add_href' => '/admin/special/add',
        ];
    }
    function setData(SpecialRequest $request){
        return [
            'item' => $request->special_item,
            'title' => $request->special_title,
            'sub_title' => $request->special_sub_title,
            'description' => $request->special_description,
            'image' => $request->image_hidden,
            'thumb' => $request->thumb_hidden,
            'width' => $request->width_hidden,
            'height' => $request->height_hidden,
            'active' => $request->special_active,
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
    public function postAdd(SpecialRequest $request){
        $data = self::setData($request);
        $this->special->insert($data);
        return response()->json(['status'=>'success']);
    }
    public function edit(Request $request, $id){
        $display_view = self::displayViewEdit();
        $special = $this->special->getId($id);
        if(!empty($id)){
            if(!empty($special[0])){
                $request->session()->put('id', $id);
                $special = $special[0];
            }else{
                return redirect()->route('admin.special.index')->with('msg', 'nhóm người sử dụng không tồn tại');
            }
        }else{
            return redirect()->route('admin.special.index')->with('msg', 'liên kết không tồn tại');
        }
        return view('admin.main', compact('display_view', 'special'));
    }
    public function postEdit(SpecialRequest $request){
        $id = session('id');
        $data = self::setData($request);
        $this->special->updateId($id, $data);
        return response()->json(['status'=>'success']);
     }
    public function list(){
        $display_view = self::displayViewList();
        $num_page = self::PAGE;
        $special_list = $this->special->getPage(self::PAGE);
        if($special_list->currentPage()!=1){
            if(count($special_list)==0)
                return redirect('admin/special/list');
        }else{
            if(count($special_list)==0)
                return redirect('admin/special/add');
        }
        return view('admin.main', compact('display_view', 'special_list', 'num_page'));
    }
    public function active(Request $request){
        $data = [
                'active' => $request->special_active,
                'create_at' => date('Y-m-d H:i:s'),
                'update_at' => date('Y-m-d H:i:s'),
            ];
        $this->special->updateActiveId($request->id, $data);
        return response()->json(['status'=>'success']);
    }
    public function delete(Request $request){
        $result = $this->special->deleteId($request->id);
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
