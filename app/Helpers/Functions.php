<?php
namespace App\Helpers;
use App\Models\UserGroup;
use App\Models\User;
use App\Models\ProductGroup;
use App\Models\Product;
class Functions
{
    public static function isUppercase($value, $message, $fail){
        if($value != mb_strtoupper($value, 'UTF-8')){
            $fail($message);
        }
    }
    public static function getAllUserGroup(){
        $user_group = new UserGroup();
        return $user_group->getAllActive();
    }
    public static function getAllUser(){
        $user = new User();
        return $user->getAll();
    }
    public static function getAllProductGroup(){
        $product_group = new ProductGroup();
        return $product_group->getAllActive();
    }
    public static function getAllProduct(){
        $product = new Product();
        return $product->getAll();
    }
}
