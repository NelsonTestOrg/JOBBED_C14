<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('UI/home.php');
    }
    public function login(){
        return view('UI/test.php');
    }
}
