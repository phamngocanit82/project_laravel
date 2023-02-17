<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Gallery extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'title',
        'description',
        'image',
        'thumb',
        'width',
        'height',
        'active',
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
    protected $table = 'gallery';
    public function getAll(){
        $gallery = DB::table($this->table)->orderBy('title', 'ASC')->get();
        return $gallery;
    }
    public function getAllActive(){
        $gallery = DB::table($this->table)->where('active', '1')->orderBy('item', 'ASC')->get();
        return $gallery;
    }
    public function getPage($page=null){
        $gallery = DB::table($this->table)->orderBy('title', 'ASC');
        if(!empty($page)){
            $gallery = $gallery->paginate($page);
        }else{
            $gallery = $gallery->get();
        }
        return $gallery;
    }
    public function insert($data){
        DB::table($this->table)->insert($data);
    }
    public function getId($id){
        $gallery = DB::table($this->table)->where('id', $id)->get();
        return $gallery;
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
