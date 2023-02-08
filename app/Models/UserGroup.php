<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserGroupRequest;

class UserGroup extends Model
{
    use HasFactory;
    protected $table = 'user_group';

    protected $fillable = [
        'name',
        'description',
        'active',
        'create_at',
        'update_at'
    ];
    public function getAll(){
        $user_group = DB::table($this->table)->orderBy('name', 'ASC')->get();
        return $user_group;
    }
    public function getAllActive(){
        $user_group = DB::table($this->table)->where('active', '1')->orderBy('name', 'ASC')->get();
        return $user_group;
    }
    public function getPage($page=null){
        $user_group = DB::table($this->table)->orderBy('name', 'ASC');
        if(!empty($page)){
            $user_group = $user_group->paginate($page);
        }else{
            $user_group = $user_group->get();
        }
        return $user_group;
    }
    public function insert($data){
        DB::table($this->table)->insert($data);
    }
    public function getId($id){
        $user_group = DB::table($this->table)->where('id', $id)->get();
        return $user_group;
    }
    public function deleteId($id){
        DB::table($this->table)->where('id', $id)->delete();
    }
    public function updateId($id, $data){
        DB::table($this->table)->where('id', $id)->update($data);
    }
    public function updateActiveId($id, $data){
        DB::table($this->table)->where('id', $id)->update($data);
    }
}
