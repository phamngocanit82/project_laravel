<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_group_id',
        'first_name',
        'last_name',
        'middle_name',
        'mobile_phone',
        'description',
        'email',
        'password',
        'avatar',
        'thumb',
        'width',
        'height',
        'active',
        'status',
        'create_at',
        'update_at',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    use HasFactory;
    protected $table = 'user';
    public function getAll(){
        $user = DB::table($this->table)
                    ->leftJoin('user_group', 'user.user_group_id', '=', 'user_group.id')
                    ->select('user.id', 'user.first_name', 'user.last_name', 'user.middle_name', 
                             'user.mobile_phone', 'user.description', 'user.email', 'user.avatar', 'user.thumb',  
                             'user.width', 'user.height', 'user.active', 'user_group.name AS user_group_name')
                    ->orderBy('user_group_name', 'ASC')
                    ->orderBy('user.first_name', 'ASC')
                    ->get();
        return $user;
    }
    public function getPage($page=null){
        $user = DB::table($this->table)
                    ->leftJoin('user_group', 'user.user_group_id', '=', 'user_group.id')
                    ->select('user.id', 'user.first_name', 'user.last_name', 'user.middle_name', 
                             'user.mobile_phone', 'user.description', 'user.email', 'user.avatar', 'user.thumb', 
                             'user.width', 'user.height', 'user.active', 'user_group.name AS user_group_name')
                    ->orderBy('user_group_name', 'ASC')
                    ->orderBy('user.first_name', 'ASC');
        if(!empty($page)){
            $user = $user->paginate($page);
        }else{
            $user = $user->get();
        }
        return $user;
    }
    public function insert($data){
        DB::table($this->table)->insert($data);
    }
    public function getId($id){
        $user = DB::table($this->table)->where('id', $id)->get();
        return $user;
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
