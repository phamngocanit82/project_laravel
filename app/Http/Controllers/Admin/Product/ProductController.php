<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
class ProductController extends Controller
{
    private $product;
    const PAGE = 6;
    public function __construct(){
        $this->product = new Product();
    }
    function displayViewAdd(){
        return [
            'page_view' => 'admin.product.add',
            'title' => 'Thêm sản phẩm',
            'button_save' => 'Lưu sản phẩm',
            'button_list' => 'Danh sách sản phẩm',
            'button_list_href' => '/admin/product/list',
        ];   
    }
    function displayViewEdit(){
        return [
            'page_view' => 'admin.product.edit',
            'title' => 'Chỉnh sửa thông tin sản phẩm',
            'button_add' => 'Thêm sản phẩm',
            'button_add_href' => '/admin/product/add',
            'button_save' => 'Lưu sản phẩm',
            'button_list' => 'Danh sách sản phẩm',
            'button_list_href' => '/admin/product/list',
        ];
    }
    function displayViewList(){
        return [
            'page_view' => 'admin.product.list',
            'title' => 'Danh sách sản phẩm',
            'search_view' => 'search',
            'button_add' => 'Thêm sản phẩm',
            'button_add_href' => '/admin/product/add',
        ];
    }
    function setData(ProductRequest $request){
        return [
            'product_group_id' => $request->product_group_id,
            'name' => $request->product_name,
            'code' => $request->product_code,
            'price' => $request->product_price,
            'sale' => $request->product_sale,
            'description' => $request->product_description,
            'image' => $request->image_hidden,
            'thumb' => $request->thumb_hidden,
            'width' => $request->width_hidden,
            'height' => $request->height_hidden,
            'active' => $request->product_active,
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
    public function postAdd(ProductRequest $request){
        $data = self::setData($request);
        $this->product->insert($data);
        return response()->json(['status'=>'success']);
    }
    public function edit(Request $request, $id){
        $display_view = self::displayViewEdit();
        $product = $this->product->getId($id);
        if(!empty($id)){
            if(!empty($product[0])){
                $request->session()->put('id', $id);
                $product = $product[0];
            }else{
                return redirect()->route('admin.product.index')->with('msg', 'nhóm người sử dụng không tồn tại');
            }
        }else{
            return redirect()->route('admin.product.index')->with('msg', 'liên kết không tồn tại');
        }
        return view('admin.main', compact('display_view', 'product'));
    }
    public function postEdit(ProductRequest $request){
        $id = session('id');
        $data = self::setData($request);
        $this->product->updateId($id, $data);
        return response()->json(['status'=>'success']);
     }
    public function list(){
        $display_view = self::displayViewList();
        $num_page = self::PAGE;
        $product_list = $this->product->getPage(self::PAGE);
        if($product_list->currentPage()!=1){
            if(count($product_list)==0)
                return redirect('admin/product/list');
        }else{
            if(count($product_list)==0)
                return redirect('admin/product/add');
        }
        return view('admin.main', compact('display_view', 'product_list', 'num_page'));
    }
    public function active(Request $request){
        $data = [
                'active' => $request->user_active,
                'create_at' => date('Y-m-d H:i:s'),
                'update_at' => date('Y-m-d H:i:s'),
            ];
        $this->product->updateActiveId($request->id, $data);
        return response()->json(['status'=>'success']);
    }
    public function delete(Request $request){
        $result = $this->product->deleteId($request->id);
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
