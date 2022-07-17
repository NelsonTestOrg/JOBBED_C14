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
        $sesion = session();
        $login_email = $this->request->getPost("login_email");
        $login_pass = $this->request->getPost("login_password");

        $user_login = new user_model();
        $login_res = $user_login->login($login_email);
        $hashed_pass = $login_res['user_password'];
        $db_uname = $login_res['users_name'];
        $db_uID = $login_res['user_id'];
        $db_email = $login_res['user_email'];

        $user_data = [
            'user_name' => $db_uname,
            'user_id' => $db_uID,
            'user_email' => $db_email
        ];

        if (password_verify($login_pass, $hashed_pass)) {
            $sesion->set($user_data);
            echo 1;
        } else {
            echo 0;
        }
    }
    public function postIssue()
    {
        $issue_owner_id = $this->request->getPost('user_id');
        $issue_category = $this->request->getPost('issue_category');
        $issue_venue = $this->request->getPost('issue_venue');
        $issue_description = $this->request->getPost('issue_details');
        $issue_location = $this->request->getPost('issue_location');

        $model_instance = new user_model();
        $result = $model_instance->post_issue($issue_owner_id, $issue_category, $issue_venue, $issue_description, $issue_location);

        if ($result) {
            // return redirect()->back()->with('fail', 'Something went awfully wrong');
            echo 1;
        } else {
            // return redirect()->back()->with('success', 'You have been registered successfully');
            echo 0;
        }
    }
    public function getServices()
    {
        $model_instance = new user_model();
        $request_query = "SELECT * FROM tbl_services";
        $service_array = $model_instance->getData($request_query);
        return $this->response->setJSON($service_array);
    }
    public function getLocation()
    {
        $model_instance = new user_model();
        $request_query = "SELECT * FROM tbl_service_location";
        $service_array = $model_instance->getData($request_query);
        return $this->response->setJSON($service_array);
    }
    public function getPendingIssues()
    {
        $model_instance = new user_model();
        $owner_id = $this->request->getPost('user_id');
        $request_query = "SELECT tbl_services.service_name , tbl_service_location.location_name, tbl_issues.* FROM tbl_issues INNER JOIN tbl_services ON tbl_issues.issue_category = tbl_services.service_id INNER JOIN tbl_service_location ON tbl_issues.issue_location = tbl_service_location.location_id WHERE tbl_issues.issue_owner_id ='$owner_id' AND tbl_issues.issue_status = 1";
        $service_array = $model_instance->getData($request_query);
        return $this->response->setJSON($service_array);
    }
    public function getRequestData()
    {
        $model_instance = new user_model();
        $issue_id = $this->request->getPost('issue_id');
        $request_query = "SELECT tbl_requests.request_bidder_id,tbl_requests.request_bid_amt FROM tbl_issues INNER JOIN tbl_requests ON tbl_requests.request_issue_id = tbl_issues.issue_id WHERE tbl_issues.issue_id = '$issue_id'";
        $service_array = $model_instance->getData($request_query);
        return $this->response->setJSON($service_array);
    }
    public function getHistory()
    {
        $model_instance = new user_model();
        $owner_id = $this->request->getPost('user_id');
        $request_query = "SELECT tbl_users.users_name,tbl_services.service_name,tbl_service_location.location_name, tbl_issues.* FROM tbl_issues INNER JOIN tbl_users ON tbl_issues.issue_handler_id = tbl_users.user_id INNER JOIN tbl_services ON tbl_issues.issue_category = tbl_services.service_id INNER JOIN tbl_service_location ON tbl_issues.issue_location = tbl_service_location.location_id WHERE tbl_issues.issue_owner_id = '$owner_id' AND tbl_issues.issue_status = 3;";
        $service_array = $model_instance->getData($request_query);
        return $this->response->setJSON($service_array);
    }

    public function getFreeJobs()
    {
        $model_instance = new user_model();
        // $user_id = $this ->request->getPost('user_id');
        $request_query = "SELECT * FROM tbl_issues";
        $result_array = $model_instance->getData($request_query);
        return $this->response->setJSON($result_array);
    }
}
