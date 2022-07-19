<?php

namespace App\Controllers;

use App\Models\user_model;

class data_handling extends BaseController
{
    // public function new_user()
    // {
    // lastname = $this->request->getPost('user_name');
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
            $role_id = '3';

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
    public function worker_register()
    {
        // $validation = $this->validate([
        //     'user_name' => [
        //         'rules' => 'required|is_unique[tbl_users.users_name]',
        //         'errors' => [
        //             'required' => 'Your user name is required',
        //             'is_unique' => 'Username already taken!'
        //         ]
        //     ],
        //     'user_email' => [
        //         'rules' => 'required|valid_email|is_unique[tbl_users.user_email]',
        //         'errors' => [
        //             'required' => 'Your email is required',
        //             'is_unique' => 'This email already exists!',
        //             'valid_email' => 'Please enter a valid email address'
        //         ]

        //     ],
        //     'user_password' => [
        //         'rules' => 'required|min_length[5]|max_length[18]',
        //         'errors' => [
        //             'required' => 'Password is required',
        //             'min_length' => 'Password must have at least 5 characters',
        //             'max_length' => 'Password must have at most 18 characters',
        //         ]
        //     ]
        // ]);

        // if (!$validation) {
        //     echo 2;
        // } else {
        $first_name = $this->request->getPost('first_name');
        $last_name = $this->request->getPost('last_name');
        $worker_email = $this->request->getPost('reg_email');
        $worker_password = $this->request->getPost('reg_nat_id');
        $worker_phone_no = $this->request->getPost('phone_number');
        $worker_nat_id = $this->request->getPost('reg_nat_id');
        $worker_address = $this->request->getPost('reg_address');
        $worker_conduct = $this->request->getFile('reg_conduct');
        $worker_id_photo = $this->request->getFile('reg_id_photo');
        $worker_service_id = $this->request->getPost('reg_expertise');

        if ($worker_id_photo->isValid() && !$worker_id_photo->hasMoved()) {
            $worker_photo_name = $worker_id_photo->getRandomName();
            $worker_id_photo->move('assets/', $worker_photo_name);
        }
        if ($worker_conduct->isValid() && !$worker_conduct->hasMoved()) {
            $worker_conduct_name = $worker_conduct->getRandomName();
            $worker_conduct->move('assets/', $worker_conduct_name);
        }


        $hashed_password = password_hash($worker_password, PASSWORD_BCRYPT);
        $is_verified = '0';

        $my_user_reg = new user_model();
        $insertion_query = "INSERT INTO tbl_workers ( worker_fname, worker_lname, worker_email, worker_phone_no, worker_nat_id, worker_address, worker_cert_good_cond, worker_n_id_photo, worker_service_id, worker_password, is_verfied) VALUES ('$first_name', '$last_name', '$worker_email', '$worker_phone_no', '$worker_nat_id', '$worker_address', '$worker_conduct_name', '$worker_photo_name', '$worker_service_id', '$hashed_password', '$is_verified');";
        $result = $my_user_reg->setData($insertion_query);

        if ($result) {
            // return redirect()->back()->with('fail', 'Something went awfully wrong');
            echo 1;
        } else {
            // return redirect()->back()->with('success', 'You have been registered successfully');
            echo 0;
        }
        // }
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
    public function workerLogin()
    {
        $sesion = session();
        $login_email = $this->request->getPost("worker_email");
        $login_pass = $this->request->getPost("worker_password");
        $request_query = "SELECT * FROM tbl_users WHERE user_email = '$login_email' ";

        $user_login = new user_model();
        $login_res = $user_login->loginworker($request_query);
        $role_id = $login_res['user_role_id'];
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
            session_reset();
            $sesion->set($user_data);
            echo $role_id;
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
        $request_query = "SELECT *  FROM tbl_services";
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
        $current_user_id = $this->request->getPost('user_id');
        $request_query = "SELECT tbl_users.users_name, tbl_service_location.location_name, tbl_services.service_name, tbl_issues.* FROM tbl_issues INNER JOIN tbl_service_location ON tbl_issues.issue_location = tbl_service_location.location_id INNER JOIN tbl_users ON tbl_issues.issue_owner_id = tbl_users.user_id INNER JOIN tbl_services ON tbl_issues.issue_category = tbl_services.service_id WHERE tbl_issues.issue_status = 1 AND tbl_issues.issue_owner_id != '$current_user_id' ;";
        $result_array = $model_instance->getData($request_query);
        return $this->response->setJSON($result_array);
    }
    public function getActiveJobs()
    {
        $model_instance = new user_model();
        $current_user_id = $this->request->getPost('user_id');
        $request_query = "SELECT tbl_users.users_name, tbl_service_location.location_name, tbl_services.service_name, tbl_issues.* FROM tbl_issues INNER JOIN tbl_service_location ON tbl_issues.issue_location = tbl_service_location.location_id INNER JOIN tbl_users ON tbl_issues.issue_owner_id = tbl_users.user_id INNER JOIN tbl_services ON tbl_issues.issue_category = tbl_services.service_id WHERE tbl_issues.issue_status = 2 AND tbl_issues.issue_handler_id = '$current_user_id' ;";
        $result_array = $model_instance->getData($request_query);
        return $this->response->setJSON($result_array);
    }
    public function getPendingJobs()
    {
        $model_instance = new user_model();
        $current_user_id = $this->request->getPost('user_id');
        $request_query = "SELECT tbl_users.users_name, tbl_service_location.location_name, tbl_services.service_name, tbl_issues.* FROM tbl_issues INNER JOIN tbl_service_location ON tbl_issues.issue_location = tbl_service_location.location_id INNER JOIN tbl_users ON tbl_issues.issue_owner_id = tbl_users.user_id INNER JOIN tbl_services ON tbl_issues.issue_category = tbl_services.service_id WHERE tbl_issues.issue_status = 2 AND tbl_issues.issue_handler_id = '$current_user_id' ;";
        $result_array = $model_instance->getData($request_query);
        return $this->response->setJSON($result_array);
    }
    public function getUsers()
    {
        $model_instance = new user_model();
        $request_query = "SELECT tbl_users.* ,tbl_roles.role_name FROM tbl_users INNER JOIN tbl_roles ON tbl_users.user_role_id = tbl_roles.role_id;";
        $service_array = $model_instance->getData($request_query);
        return $this->response->setJSON($service_array);
    }
    public function getIssues()
    {
        $model_instance = new user_model();
        $request_query = "SELECT tbl_issues.* ,tbl_users.users_name,tbl_services.service_name,tbl_service_location.location_name,tbl_status.status_name FROM tbl_issues INNER JOIN tbl_status ON tbl_issues.issue_status = tbl_status.status_id INNER JOIN tbl_services ON tbl_issues.issue_category = tbl_services.service_id INNER JOIN tbl_service_location ON tbl_issues.issue_location = tbl_service_location.location_id INNER JOIN tbl_users ON tbl_issues.issue_owner_id =tbl_users.user_id ;";
        $service_array = $model_instance->getData($request_query);
        return $this->response->setJSON($service_array);
    }
    public function addService()
    {
        $model_instance = new user_model();
        $service_name = $this->request->getPost('service_name');
        $service_photo = $this->request->getFile('service_img');
        if ($service_photo->isValid() && !$service_photo->hasMoved()) {
            $image_name = $service_photo->getRandomName();
            $service_photo->move('assets/', $image_name);
        }

        $insert_query = "INSERT INTO `tbl_services` (`service_id`, `service_name`,`service_photo`) VALUES (NULL, '$service_name','$image_name');";
        $service_array = $model_instance->setData($insert_query);

        if ($service_array) {
            echo "<script>alert('Service added successfully');window.location.href='/adminServiceAdd';</script>";
        } else {
            echo "<script>alert('Bad News');window.location.href='/adminServiceAdd';</script>";
        }
    }
    public function addLocation()
    {
        $model_instance = new user_model();
        $location_name = $this->request->getPost('location_name');
        $insert_query = "INSERT INTO `tbl_service_location` (`location_id`, `location_name`) VALUES (NULL, '$location_name');";
        $service_array = $model_instance->setData($insert_query);
        if ($service_array) {
            return 1;
        } else {
            return 0;
        }
    }
    public function deleteService()
    {
        $model_instance = new user_model();
        $service_id = $this->request->getPost('service_id');
        $insert_query = "DELETE FROM tbl_services WHERE service_id = '$service_id'";
        $service_array = $model_instance->setData($insert_query);
        try {
            if ($service_array) {
                echo 1;
            } else {
                echo 0;
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    public function deleteUser()
    {
        $model_instance = new user_model();
        $user_id = $this->request->getPost('user_id');
        $insert_query = "DELETE FROM tbl_users WHERE user_id = '$user_id'";
        $service_array = $model_instance->setData($insert_query);
        try {
            if ($service_array) {
                echo 1;
            } else {
                echo 0;
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    public function deleteIssue()
    {
        $model_instance = new user_model();
        $issue_id = $this->request->getPost('issue_id');
        $insert_query = "DELETE FROM tbl_issues WHERE issue_id = '$issue_id'";
        $service_array = $model_instance->setData($insert_query);
        try {
            if ($service_array) {
                echo 1;
            } else {
                echo 0;
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    public function addRequest()
    {
        $model_instance = new user_model();
        $worker_id = $this->request->getPost('user_id');
        $service_id = $this->request->getPost('service_id');
        $bid_amount = $this->request->getPost('bid_amount');
        $data_request = "SELECT * FROM tbl_issues WHERE issue_id ='$service_id'";
        $get_issue_data = $model_instance->loginworker($data_request);

        $issue_owner_id = $get_issue_data['issue_owner_id'];

        $data_insertion = "INSERT INTO tbl_requests ";

    }
}
