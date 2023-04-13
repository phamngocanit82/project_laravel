<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\About;
class AboutController extends Controller
{
    private $about;
    const PAGE = 6;
    public function __construct(){
        $this->about = new About();
    }
    function displayViewAdd(){
        return [
            'page_view' => 'admin.about.add',
            'title' => 'Thêm thông tin về chúng tôi',
            'button_save' => 'Lưu thông tin về chúng tôi',
        ];   
    }
    function displayViewEdit(){
        return [
            'page_view' => 'admin.about.edit',
            'title' => 'Chỉnh sửa thông tin về chúng tôi',
            'button_save' => 'Lưu thông tin về chúng tôi',
        ];
    }
    function displayViewList(){
        return [
            'page_view' => 'admin.about.list',
            'title' => 'Thông tin về chúng tôi',
            'search_view' => 'search',
            'button_add' => 'Thêm thông tin về chúng tôi',
            'button_add_href' => '/admin/about/add',
        ];
    }
    function setData(AboutRequest $request){
        return [
            'title' => $request->about_title,
            'sub_title' => $request->about_sub_title,
            'description' => $request->about_description,
            'image' => $request->image_hidden,
            'thumb' => $request->thumb_hidden,
            'width' => $request->width_hidden,
            'height' => $request->height_hidden,
            'active' => $request->about_active,
            'create_at' => date('Y-m-d H:i:s'),
            'update_at' => date('Y-m-d H:i:s'),
        ];
    }
    public function index(){
        return self::list();
    }
    public function add(){
        $about = $this->about->getId(0);
        if(!empty($about[0])){
            $about = $about[0];
            $display_view = self::displayViewEdit();
            return view('admin.main', compact('display_view', 'about'));
        }else{
            $display_view = self::displayViewAdd();
            return view('admin.main', compact('display_view'));
        }
    }
    public function postAdd(AboutRequest $request){
        $data = self::setData($request);
        $this->about->insert($data);
        return response()->json(['status'=>'success']);
    }
    public function edit(Request $request, $id){
        $display_view = self::displayViewEdit();
        $about = $this->about->getId($id);
        if(!empty($id)){
            if(!empty($about[0])){
                $request->session()->put('id', $id);
                $about = $about[0];
            }else{
                return redirect()->route('admin.about.index')->with('msg', 'nhóm người sử dụng không tồn tại');
            }
        }else{
            return redirect()->route('admin.about.index')->with('msg', 'liên kết không tồn tại');
        }
        return view('admin.main', compact('display_view', 'about'));
    }
    public function postEdit(AboutRequest $request){
        $data = self::setData($request);
        $this->about->updateId($data);
        return response()->json(['status'=>'success']);
     }
    public function list(){
        $display_view = self::displayViewList();
        $num_page = self::PAGE;
        $about_list = $this->about->getPage(self::PAGE);
        if($about_list->currentPage()!=1){
            if(count($about_list)==0)
                return redirect('admin/about/list');
        }else{
            if(count($about_list)==0)
                return redirect('admin/about/add');
        }
        return view('admin.main', compact('display_view', 'about_list', 'num_page'));
    }
    public function active(Request $request){
        $data = [
                'active' => $request->about_active,
                'create_at' => date('Y-m-d H:i:s'),
                'update_at' => date('Y-m-d H:i:s'),
            ];
        $this->about->updateActiveId($data);
        return response()->json(['status'=>'success']);
    }
    public function delete(Request $request){
        $result = $this->about->deleteId($request->id);
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
