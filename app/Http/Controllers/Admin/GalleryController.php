<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Gallery;
class GalleryController extends Controller
{
    private $gallery;
    const PAGE = 6;
    public function __construct(){
        $this->gallery = new Gallery();
    }
    function displayViewAdd(){
        return [
            'page_view' => 'admin.gallery.add',
            'title' => 'Thêm thư viện ảnh',
            'button_save' => 'Lưu thư viện ảnh',
            'button_list' => 'Danh sách thư viện ảnh',
            'button_list_href' => '/admin/gallery/list',
        ];   
    }
    function displayViewEdit(){
        return [
            'page_view' => 'admin.gallery.edit',
            'title' => 'Chỉnh sửa thông tin thư viện ảnh',
            'button_add' => 'Thêm thư viện ảnh',
            'button_add_href' => '/admin/gallery/add',
            'button_save' => 'Lưu thư viện ảnh',
            'button_list' => 'Danh sách thư viện ảnh',
            'button_list_href' => '/admin/gallery/list',
        ];
    }
    function displayViewList(){
        return [
            'page_view' => 'admin.gallery.list',
            'title' => 'Danh sách thư viện ảnh',
            'search_view' => 'search',
            'button_add' => 'Thêm thư viện ảnh',
            'button_add_href' => '/admin/gallery/add',
        ];
    }
    function setData(GalleryRequest $request){
        return [
            'title' => $request->gallery_title,
            'description' => $request->gallery_description,
            'image' => $request->image_hidden,
            'thumb' => $request->thumb_hidden,
            'width' => $request->width_hidden,
            'height' => $request->height_hidden,
            'active' => $request->gallery_active,
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
    public function postAdd(GalleryRequest $request){
        $data = self::setData($request);
        $this->gallery->insert($data);
        return response()->json(['status'=>'success']);
    }
    public function edit(Request $request, $id){
        $display_view = self::displayViewEdit();
        $gallery = $this->gallery->getId($id);
        if(!empty($id)){
            if(!empty($gallery[0])){
                $request->session()->put('id', $id);
                $gallery = $gallery[0];
            }else{
                return redirect()->route('admin.gallery.index')->with('msg', 'nhóm người sử dụng không tồn tại');
            }
        }else{
            return redirect()->route('admin.gallery.index')->with('msg', 'liên kết không tồn tại');
        }
        return view('admin.main', compact('display_view', 'gallery'));
    }
    public function postEdit(GalleryRequest $request){
        $id = session('id');
        $data = self::setData($request);
        $this->gallery->updateId($id, $data);
        return response()->json(['status'=>'success']);
     }
    public function list(){
        $display_view = self::displayViewList();
        $num_page = self::PAGE;
        $gallery_list = $this->gallery->getPage(self::PAGE);
        if($gallery_list->currentPage()!=1){
            if(count($gallery_list)==0)
                return redirect('admin/gallery/list');
        }else{
            if(count($gallery_list)==0)
                return redirect('admin/gallery/add');
        }
        return view('admin.main', compact('display_view', 'gallery_list', 'num_page'));
    }
    public function active(Request $request){
        $data = [
                'active' => $request->gallery_active,
                'create_at' => date('Y-m-d H:i:s'),
                'update_at' => date('Y-m-d H:i:s'),
            ];
        $this->gallery->updateActiveId($request->id, $data);
        return response()->json(['status'=>'success']);
    }
    public function delete(Request $request){
        $result = $this->gallery->deleteId($request->id);
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
