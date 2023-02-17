<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Event;
class EventController extends Controller
{
    private $event;
    const PAGE = 6;
    public function __construct(){
        $this->event = new Event();
    }
    function setData(EventRequest $request){
        return [
            'title' => $request->event_title,
            'sub_title' => $request->event_sub_title,
            'price' => $request->event_price,
            'description' => $request->event_description,
            'image' => $request->image_hidden,
            'thumb' => $request->thumb_hidden,
            'width' => $request->width_hidden,
            'height' => $request->height_hidden,
            'active' => $request->event_active,
            'create_at' => date('Y-m-d H:i:s'),
            'update_at' => date('Y-m-d H:i:s'),
        ];
    }
    public function index(){
        return self::list();
    }
    public function add(){
        $page_view = 'admin.event.add';
        $title = 'Events / Add';
        return view('admin.main', compact('page_view', 'title'));
    }
    public function postAdd(EventRequest $request){
        $data = self::setData($request);
        $this->event->insert($data);
        return response()->json(['status'=>'success']);
    }
    public function edit(Request $request, $id){
        $page_view = 'admin.event.edit';
        $title = 'Events/ Edit';
        $event = $this->event->getId($id);
        if(!empty($id)){
            if(!empty($event[0])){
                $request->session()->put('id', $id);
                $event = $event[0];
            }else{
                return redirect()->route('admin.event.index')->with('msg', 'nhóm người sử dụng không tồn tại');
            }
        }else{
            return redirect()->route('admin.event.index')->with('msg', 'liên kết không tồn tại');
        }
        return view('admin.main', compact('page_view', 'title', 'event'));
    }
    public function postEdit(EventRequest $request){
        $id = session('id');
        $data = self::setData($request);
        $this->event->updateId($id, $data);
        return response()->json(['status'=>'success']);
     }
    public function list(){
        $page_view = 'admin.event.list';
        $title = 'Events / List';
        $num_page = self::PAGE;
        $event_list = $this->event->getPage(self::PAGE);
        if($event_list->currentPage()!=1){
            if(count($event_list)==0)
                return redirect('admin/event/list');
        }else{
            if(count($event_list)==0)
                return redirect('admin/event/add');
        }
        return view('admin.main', compact('page_view', 'title', 'event_list', 'num_page'));
    }
    public function active(Request $request){
        $data = [
                'active' => $request->event_active,
                'create_at' => date('Y-m-d H:i:s'),
                'update_at' => date('Y-m-d H:i:s'),
            ];
        $this->event->updateActiveId($request->id, $data);
        return response()->json(['status'=>'success']);
    }
    public function delete(Request $request){
        $result = $this->event->deleteId($request->id);
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
