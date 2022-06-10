<?php

namespace App\Controllers;

use App\Models\user_model;

class data_handling extends BaseController
{
    public function new_user()
    {
        $firstname = $this->request->getPost('user_name');
        // $date = $this->request->getPost('date_created');
        $email = $this->request->getPost('user_email');
        $password = $this->request->getPost('user_password');
     

        $add = new user_model();

        $result = $add->add_user($firstname,$email, $password);

        try {
            if ($result) {
                echo 1;
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}
