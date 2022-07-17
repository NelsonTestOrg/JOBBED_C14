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
    public function loginworker($login_email)
    {
        $db = db_connect();
        $login_result = $db->query("SELECT * FROM tbl_users WHERE user_email = '$login_email' AND user_role_id = 2 ");

        return $login_result->getRowArray();
    }
    public function post_issue($issue_owner_id, $issue_category, $issue_location_id, $issue_details, $issue_map_location)
    {
        $issue_status_id = 1;
        $db = db_connect();
        $post_result = $db->query("INSERT INTO tbl_issues (issue_owner_id, issue_category, issue_location, issue_details, issue_map_location, issue_status) VALUES('$issue_owner_id', '$issue_category','$issue_location_id','$issue_details','$issue_map_location','$issue_status_id')");
        return $post_result;
    }
    public function getData($sql_query)
    {
        $db = db_connect();
        $data_values = $db->query($sql_query);
        return $data_values->getResultArray();
    }
}
