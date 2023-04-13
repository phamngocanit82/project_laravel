<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\News;
class NewsController extends Controller
{
    private $news;
    const PAGE = 6;
    public function __construct(){
        $this->news = new News();
    }
    function displayViewAdd(){
        return [
            'page_view' => 'admin.news.add',
            'title' => 'Thêm tin tức',
            'button_save' => 'Lưu tin tức',
            'button_list' => 'Danh sách tin tức',
            'button_list_href' => '/admin/news/list',
        ];   
    }
    function displayViewEdit(){
        return [
            'page_view' => 'admin.news.edit',
            'title' => 'Chỉnh sửa thông tin tin tức',
            'button_add' => 'Thêm tin tức',
            'button_add_href' => '/admin/news/add',
            'button_save' => 'Lưu tin tức',
            'button_list' => 'Danh sách tin tức',
            'button_list_href' => '/admin/news/list',
        ];
    }
    function displayViewList(){
        return [
            'page_view' => 'admin.news.list',
            'title' => 'Danh sách tin tức',
            'search_view' => 'search',
            'button_add' => 'Thêm tin tức',
            'button_add_href' => '/admin/news/add',
        ];
    }
    function setData(NewsRequest $request){
        return [
            'title' => $request->news_title,
            'sub_title' => $request->news_sub_title,
            'description' => $request->news_description,
            'image' => $request->image_hidden,
            'thumb' => $request->thumb_hidden,
            'width' => $request->width_hidden,
            'height' => $request->height_hidden,
            'active' => $request->news_active,
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
    public function postAdd(NewsRequest $request){
        $data = self::setData($request);
        $this->news->insert($data);
        return response()->json(['status'=>'success']);
    }
    public function edit(Request $request, $id){
        $display_view = self::displayViewEdit();
        $news = $this->news->getId($id);
        if(!empty($id)){
            if(!empty($news[0])){
                $request->session()->put('id', $id);
                $news = $news[0];
            }else{
                return redirect()->route('admin.news.index')->with('msg', 'nhóm người sử dụng không tồn tại');
            }
        }else{
            return redirect()->route('admin.news.index')->with('msg', 'liên kết không tồn tại');
        }
        return view('admin.main', compact('display_view', 'news'));
    }
    public function postEdit(NewsRequest $request){
        $id = session('id');
        $data = self::setData($request);
        $this->news->updateId($id, $data);
        return response()->json(['status'=>'success']);
     }
    public function list(){
        $display_view = self::displayViewList();
        $num_page = self::PAGE;
        $news_list = $this->news->getPage(self::PAGE);
        if($news_list->currentPage()!=1){
            if(count($news_list)==0)
                return redirect('admin/news/list');
        }else{
            if(count($news_list)==0)
                return redirect('admin/news/add');
        }
        return view('admin.main', compact('display_view', 'news_list', 'num_page'));
    }
    public function active(Request $request){
        $data = [
                'active' => $request->news_active,
                'create_at' => date('Y-m-d H:i:s'),
                'update_at' => date('Y-m-d H:i:s'),
            ];
        $this->news->updateActiveId($request->id, $data);
        return response()->json(['status'=>'success']);
    }
    public function delete(Request $request){
        $result = $this->news->deleteId($request->id);
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
