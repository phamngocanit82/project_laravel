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
        $page_view = 'admin.gallery.add';
        $title = 'Galleries / Add';
        return view('admin.main', compact('page_view', 'title'));
    }
    public function postAdd(GalleryRequest $request){
        $data = self::setData($request);
        $this->gallery->insert($data);
        return response()->json(['status'=>'success']);
    }
    public function edit(Request $request, $id){
        $page_view = 'admin.gallery.edit';
        $title = 'Galleries / Edit';
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
        return view('admin.main', compact('page_view', 'title', 'gallery'));
    }
    public function postEdit(GalleryRequest $request){
        $id = session('id');
        $data = self::setData($request);
        $this->gallery->updateId($id, $data);
        return response()->json(['status'=>'success']);
     }
    public function list(){
        $page_view = 'admin.gallery.list';
        $title = 'Galleries / List';
        $num_page = self::PAGE;
        $gallery_list = $this->gallery->getPage(self::PAGE);
        if($gallery_list->currentPage()!=1){
            if(count($gallery_list)==0)
                return redirect('admin/gallery/list');
        }else{
            if(count($gallery_list)==0)
                return redirect('admin/gallery/add');
        }
        return view('admin.main', compact('page_view', 'title', 'gallery_list', 'num_page'));
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
