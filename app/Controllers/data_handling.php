<?php

namespace App\Controllers;

use App\Models\user_model;

class data_handling extends BaseController
{
    // public function new_user()
    // {
    //     $firstname = $this->request->getPost('user_name');
    //     // $date = $this->request->getPost('date_created');
    //     $email = $this->request->getPost('user_email');
    //     $password = $this->request->getPost('user_password');


    //     $add = new user_model();

    //     $result = $add->add_user($firstname, $email, $password);

    //     try {
    //         if ($result) {
    //             echo 1;
    //         }
    //     } catch (\Throwable $th) {
    //         echo $th->getMessage();
    //     }
    // }
    public function register()
    {

        $validation = $this->validate([
            'user_name' => [
                'rules' => 'required|is_unique[tbl_users.users_name]',
                'errors' => [
                    'required' => 'Your user name is required',
                    'is_unique' => 'Username already taken!'
                ]
            ],
            'user_email' => [
                'rules' => 'required|valid_email|is_unique[tbl_users.user_email]',
                'errors' => [
                    'required' => 'Your email is required',
                    'is_unique' => 'This email already exists!',
                    'valid_email' => 'Please enter a valid email address'
                ]

            ],
            'user_password' => [
                'rules' => 'required|min_length[5]|max_length[18]',
                'errors' => [
                    'required' => 'Password is required',
                    'min_length' => 'Password must have at least 5 characters',
                    'max_length' => 'Password must have at most 18 characters',
                ]
            ]
        ]);

        if (!$validation) {
            echo 2;
        } else {
            $username = $this->request->getPost('user_name');
            $email = $this->request->getPost('user_email');
            $password = $this->request->getPost('user_password');
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $role_id = '1';


            $my_user_reg = new user_model();
            $result = $my_user_reg->add_user($username, $email, $hashed_password, $role_id);

            if ($result) {
                // return redirect()->back()->with('fail', 'Something went awfully wrong');
                echo 1;
            } else {
                // return redirect()->back()->with('success', 'You have been registered successfully');
                echo 0;
            }
        }
    }
    public function login()
    {
        $login_email = $this->request->getPost("login_email");
        $login_pass = $this->request->getPost("login_password");
        $user_login = new user_model();
        $login_res = $user_login->login($login_email);

        if ($login_res == false) {
            echo 0;
        } else {
            $db_pass = $login_res['user_password'];
            $db_uname = $login_res['users_name'];
            $final_pass = password_verify($db_pass, $login_pass);
            
            if ($final_pass) {
                $_SESSION['user_name'] = $db_uname;
                echo 1;
            } else {
                echo 0;
            }
        }
    }
}
