<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
class UserController extends Controller
{
    private $user;
    const PAGE = 6;
    public function __construct(){
        $this->user = new User();
    }
    function setData(UserRequest $request){
        return [
            'user_group_id' => $request->user_group_id,
            'first_name' => $request->user_first_name,
            'last_name' => $request->user_last_name,
            'middle_name' => $request->user_middle_name,
            'mobile_phone' => $request->user_mobile_phone,
            'description' => $request->user_description,
            'email' => $request->user_email,
            'password' => $request->user_password,
            'avatar' => $request->avatar_hidden,
            'thumb' => $request->thumb_hidden,
            'width' => $request->width_hidden,
            'height' => $request->height_hidden,
            'active' => $request->user_active,
            'status' => '1',
            'create_at' => date('Y-m-d H:i:s'),
            'update_at' => date('Y-m-d H:i:s'),
        ];
    }
    public function index(){
        return self::list();
    }
    public function add(){
        $page_view = 'admin.user.add';
        $title = 'Users / Add';
        return view('admin.main', compact('page_view', 'title'));
    }
    public function postAdd(UserRequest $request){
        $data = self::setData($request);
        $this->user->insert($data);
        return response()->json(['status'=>'success']);
    }
    public function edit(Request $request, $id){
        $page_view = 'admin.user.edit';
        $title = 'Users / Edit';
        $user = $this->user->getId($id);
        if(!empty($id)){
            if(!empty($user[0])){
                $request->session()->put('id', $id);
                $user = $user[0];
            }else{
                return redirect()->route('admin.user.index')->with('msg', 'nhóm người sử dụng không tồn tại');
            }
        }else{
            return redirect()->route('admin.user.index')->with('msg', 'liên kết không tồn tại');
        }
        return view('admin.main', compact('page_view', 'title', 'user'));
    }
    public function postEdit(UserRequest $request){
        $id = session('id');
        $data = self::setData($request);
        $this->user->updateId($id, $data);
        return response()->json(['status'=>'success']);
     }
    public function list(){
        $page_view = 'admin.user.list';
        $title = 'Users / List';
        $num_page = self::PAGE;
        $user_list = $this->user->getPage(self::PAGE);
        if($user_list->currentPage()!=1){
            if(count($user_list)==0)
                return redirect('admin/user/list');
        }else{
            if(count($user_list)==0)
                return redirect('admin/user/add');
        }
        return view('admin.main', compact('page_view', 'title', 'user_list', 'num_page'));
    }
    public function active(Request $request){
        $data = [
                'active' => $request->user_active,
                'create_at' => date('Y-m-d H:i:s'),
                'update_at' => date('Y-m-d H:i:s'),
            ];
        $this->user->updateActiveId($request->id, $data);
        return response()->json(['status'=>'success']);
    }
    public function delete(Request $request){
        $result = $this->user->deleteId($request->id);
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
