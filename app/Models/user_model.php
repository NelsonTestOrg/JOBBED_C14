<?php

namespace App\Models;

use CodeIgniter\Model;

class user_model extends Model
{
    public function add_user($user_name, $user_email, $user_password, $role_id)
    {
        $db = db_connect();
        $is_deleted = 0;

        $result = $db->query("INSERT INTO tbl_users(users_name,user_email,user_password,user_role_id,is_deleted) VALUES ('$user_name','$user_email','$user_password','$role_id','$is_deleted')");
        return $result;
    }
    public function login($login_email)
    {
        $db = db_connect();
        $login_result = $db->query("SELECT * FROM tbl_users WHERE user_email = '" . $login_email . "'");

        return $login_result->getRowArray();
    }
}
