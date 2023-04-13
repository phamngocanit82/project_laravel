<?php

namespace App\Http\Controllers\Admin\Product;
use App\Http\Requests\ProductGroupRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Helpers\Functions;
use App\Models\ProductGroup;
class ProductGroupController extends Controller
{
    private $product_group;
    const PAGE = 6;
    public function __construct(){
        $this->product_group = new ProductGroup();
    }
    function displayViewAdd(){
        return [
            'page_view' => 'admin.product_group.add',
            'title' => 'Thêm nhóm sản phẩm',
            'button_save' => 'Lưu nhóm sản phẩm',
            'button_list' => 'Danh sách nhóm sản phẩm',
            'button_list_href' => '/admin/product-group/list',
        ];   
    }
    function displayViewEdit(){
        return [
            'page_view' => 'admin.product_group.edit',
            'title' => 'Chỉnh sửa thông tin nhóm sản phẩm',
            'button_add' => 'Thêm nhóm sản phẩm',
            'button_add_href' => '/admin/product-group/add',
            'button_save' => 'Lưu nhóm sản phẩm',
            'button_list' => 'Danh sách nhóm sản phẩm',
            'button_list_href' => '/admin/product-group/list',
        ];
    }
    function displayViewList(){
        return [
            'page_view' => 'admin.product_group.list',
            'title' => 'Danh sách nhóm sản phẩm',
            'search_view' => 'search',
            'button_add' => 'Thêm nhóm sản phẩm',
            'button_add_href' => '/admin/product-group/add',
        ];
    }
    function setData(ProductGroupRequest $request){
        return [
            'name' => $request->product_group_name,
            'description' => $request->product_group_description,
            'image' => $request->image_hidden,
            'thumb' => $request->thumb_hidden,
            'width' => $request->width_hidden,
            'height' => $request->height_hidden,
            'active' => $request->product_group_active,
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
    public function postAdd(ProductGroupRequest $request){
        $data = self::setData($request);
        $this->product_group->insert($data);
        return response()->json(['status'=>'success']);
    }
    public function edit(Request $request, $id){
        $display_view = self::displayViewEdit();
        $product_group = $this->product_group->getId($id);
        if(!empty($id)){
            if(!empty($product_group[0])){
                $request->session()->put('id', $id);
                $product_group = $product_group[0];
            }else{
                return redirect()->route('admin.product_group.index')->with('msg', 'nhóm người sử dụng không tồn tại');
            }
        }else{
            return redirect()->route('admin.product_group.index')->with('msg', 'liên kết không tồn tại');
        }
        return view('admin.main', compact('display_view', 'product_group'));
    }
    public function postEdit(ProductGroupRequest $request){
        $id = session('id');
        $data = self::setData($request);
        $this->product_group->updateId($id, $data);
        return response()->json(['status'=>'success']);
     }
    public function list(){
        $display_view = self::displayViewList();
        $num_page = self::PAGE;
        $product_group_list = $this->product_group->getPage(self::PAGE);
        if($product_group_list->currentPage()!=1){
            if(count($product_group_list)==0)
                return redirect('admin/product-group/list');
        }else{
            if(count($product_group_list)==0)
                return redirect('admin/product-group/add');
        }
        return view('admin.main', compact('display_view', 'product_group_list', 'num_page'));
    }
    public function active(Request $request){
        $data = [
                'active' => $request->product_group_active,
                'create_at' => date('Y-m-d H:i:s'),
                'update_at' => date('Y-m-d H:i:s'),
            ];
        $this->product_group->updateActiveId($request->id, $data);
        return response()->json(['status'=>'success']);
    }
    public function delete(Request $request){
        $result = $this->product_group->deleteId($request->id);
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
