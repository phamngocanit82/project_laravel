<?php
namespace App\Helpers;
use App\Models\UserGroup;
use App\Models\User;
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
}
