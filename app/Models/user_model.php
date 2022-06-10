<?php

namespace App\Models;

use CodeIgniter\Model;

class user_model extends Model
{
    protected $table = 'users_table';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['users_name', 'user_email', 'user_password', 'date_created', 'date_deletd', 'is_deleted'];

    //    Ld. Nelson


    public function add_user($user_name, $user_email, $user_password)
    {
        $db = db_connect();
        $is_deleted = 0;

        $result = $db->query("INSERT INTO users_table(users_name,user_email,user_password,is_deleted) VALUES ('$user_name','$user_email','$user_password','$is_deleted')");

        return $result;
    }
}
