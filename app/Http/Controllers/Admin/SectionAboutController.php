<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SectionAboutRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\SectionAbout; 
class SectionAboutController extends Controller
{
    private $section_about;
    const PAGE = 6;
    public function __construct(){
        $this->section_about = new SectionAbout();
    }
    function displayViewAdd(){
        return [
            'page_view' => 'admin.section_about.add',
            'title' => 'Thêm danh mục giới thiệu',
            'button_save' => 'Lưu danh mục giới thiệu',
            'button_list' => 'Danh sách danh mục giới thiệu',
            'button_list_href' => '/admin/section-about/list',
        ];   
    }
    function displayViewEdit(){
        return [
            'page_view' => 'admin.section_about.edit',
            'title' => 'Chỉnh sửa thông tin danh mục giới thiệu',
            'button_save' => 'Lưu danh mục giới thiệu',
            'button_list' => 'Danh sách danh mục giới thiệu',
            'button_list_href' => '/admin/section-about/list',
        ];
    }
    function displayViewList(){
        return [
            'page_view' => 'admin.section_about.list',
            'title' => 'Danh sách danh mục giới thiệu',
            'search_view' => 'search',
            'button_add' => 'Thêm danh mục giới thiệu',
            'button_add_href' => '/admin/section-about/add',
        ];
    }
    function setData(SectionAboutRequest $request){
        return [
            'title' => $request->section_about_title,
            'description' => $request->section_about_description,
            'image' => $request->image_hidden,
            'thumb' => $request->thumb_hidden,
            'width' => $request->width_hidden,
            'height' => $request->height_hidden,
            'active' => $request->section_about_active,
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
    public function postAdd(SectionAboutRequest $request){
        $data = self::setData($request);
        $this->section_about->insert($data);
        return response()->json(['status'=>'success']);
    }
    public function edit(Request $request, $id){
        $display_view = self::displayViewEdit();
        $section_about = $this->section_about->getId($id);
        if(!empty($id)){
            if(!empty($section_about[0])){
                $request->session()->put('id', $id);
                $section_about = $section_about[0];
            }else{
                return redirect()->route('admin.section_about.index')->with('msg', 'nhóm người sử dụng không tồn tại');
            }
        }else{
            return redirect()->route('admin.section_about.index')->with('msg', 'liên kết không tồn tại');
        }
        return view('admin.main', compact('display_view', 'section_about'));
    }
    public function postEdit(SectionAboutRequest $request){
        $id = session('id');
        $data = self::setData($request);
        $this->section_about->updateId($id, $data);
        return response()->json(['status'=>'success']);
     }
    public function list(){
        $display_view = self::displayViewList();
        $num_page = self::PAGE;
        $section_about_list = $this->section_about->getPage(self::PAGE);
        if($section_about_list->currentPage()!=1){
            if(count($section_about_list)==0)
                return redirect('admin/section-about/list');
        }else{
            if(count($section_about_list)==0)
                return redirect('admin/section-about/add');
        }
        return view('admin.main', compact('display_view', 'section_about_list', 'num_page'));
    }
    public function active(Request $request){
        $data = [
                'active' => $request->section_about_active,
                'create_at' => date('Y-m-d H:i:s'),
                'update_at' => date('Y-m-d H:i:s'),
            ];
        $this->section_about->updateActiveId($request->id, $data);
        return response()->json(['status'=>'success']);
    }
    public function delete(Request $request){
        $result = $this->section_about->deleteId($request->id);
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
