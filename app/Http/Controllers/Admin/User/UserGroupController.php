<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserGroupRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\UserGroup;

class UserGroupController extends Controller
{
    private $user_group;
    const PAGE = 10;
    public function __construct(){
        $this->user_group = new UserGroup();
    }
    function setData(UserGroupRequest $request){
        return [
            'name' => $request->user_group_name,
            'description' => $request->user_group_description,
            'active' => $request->user_group_active,
            'create_at' => date('Y-m-d H:i:s'),
            'update_at' => date('Y-m-d H:i:s'),
        ];
    }
    public function index(){
        return self::list();
    }
    public function add(){
        $page_view = 'admin.user_group.add';
        $title = 'User Groups / Add';
        return view('admin.main', compact('page_view', 'title'));
    }
    public function postAdd(UserGroupRequest $request){
        $data = self::setData($request);
        $this->user_group->insert($data);
        return response()->json(['status'=>'success']);
    }
    public function edit(Request $request, $id){
        $page_view = 'admin.user_group.edit';
        $title = 'User Groups / Edit';
        $user_group = $this->user_group->getId($id);
        if(!empty($id)){
            if(!empty($user_group[0])){
                $request->session()->put('id', $id);
                $user_group = $user_group[0];
            }else{
                return redirect()->route('admin.user-group.index')->with('msg', 'nhóm người sử dụng không tồn tại');
            }
        }else{
            return redirect()->route('admin.user-group.index')->with('msg', 'liên kết không tồn tại');
        }
        return view('admin.main', compact('page_view', 'title', 'user_group'));
    }
    public function postEdit(UserGroupRequest $request){
        $id = session('id');
        $data = self::setData($request);
        $this->user_group->updateId($id, $data);
        return response()->json(['status'=>'success']);
     }
    public function list(){
        $page_view = 'admin.user_group.list';
        $title = 'User Groups / List';
        $num_page = self::PAGE;
        $user_group_list = $this->user_group->getPage(self::PAGE);
        if($user_group_list->currentPage()!=1){
            if(count($user_group_list)==0)
                return redirect('admin/user-group/list');
        }
        return view('admin.main', compact('page_view', 'title', 'user_group_list', 'num_page'));
    }
    public function active(Request $request){
        $data = [
                'active' => $request->user_group_active,
                'create_at' => date('Y-m-d H:i:s'),
                'update_at' => date('Y-m-d H:i:s'),
            ];
        $this->user_group->updateActiveId($request->id, $data);
        return response()->json(['status'=>'success']);
    }
    public function delete(Request $request){
        $result = $this->user_group->deleteId($request->id);
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
