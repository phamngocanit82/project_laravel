<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ProductGroup extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'description',
        'thumb',
        'image',
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
    protected $table = 'product_group';
    public function getAll(){
        $product_group = DB::table($this->table)->orderBy('id', 'ASC')->get();
        return $product_group;
    }
    public function getAllActive(){
        $product_group = DB::table($this->table)->where('active', '1')->orderBy('id', 'ASC')->get();
        return $product_group;
    }
    public function getPage($page=null){
        $product_group = DB::table($this->table)->orderBy('id', 'ASC');
        if(!empty($page)){
            $product_group = $product_group->paginate($page);
        }else{
            $product_group = $product_group->get();
        }
        return $product_group;
    }
    public function insert($data){
        DB::table($this->table)->insert($data);
    }
    public function getId($id){
        $product_group = DB::table($this->table)->where('id', $id)->get();
        return $product_group;
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
