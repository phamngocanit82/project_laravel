<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Product extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'product_group_id',
        'name',
        'code',
        'price',
        'sale',
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
    protected $table = 'product';
    public function getAll(){
        $product = DB::table($this->table)
                    ->leftJoin('product_group', 'product.product_group_id', '=', 'product_group.id')
                    ->select('product.id', 'product.name', 'product.code', 'product.price', 
                             'product.sale', 'product.description', 'product.image', 'product.thumb',  
                             'product.width', 'product.height', 'product.active', 'product_group.name AS product_group_name')
                    ->orderBy('product_group_name', 'ASC')
                    ->orderBy('product.name', 'ASC')
                    ->get();
        return $product;
    }
    public function getPage($page=null){
        $product = DB::table($this->table)
                    ->leftJoin('product_group', 'product.product_group_id', '=', 'product_group.id')
                    ->select('product.id', 'product.name', 'product.code', 'product.price', 
                            'product.sale', 'product.description', 'product.image', 'product.thumb',  
                            'product.width', 'product.height', 'product.active', 'product_group.name AS product_group_name')
                    ->orderBy('product_group_name', 'ASC')
                    ->orderBy('product.name', 'ASC');
        if(!empty($page)){
            $product = $product->paginate($page);
        }else{
            $product = $product->get();
        }
        return $product;
    }
    public function insert($data){
        DB::table($this->table)->insert($data);
    }
    public function getId($id){
        $product = DB::table($this->table)->where('id', $id)->get();
        return $product;
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
