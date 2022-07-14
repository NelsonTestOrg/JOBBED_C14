<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('UI/home.php');
    }
    public function services()
    {
        return view('UI/services.php');
    }
    public function profile()
    {
        return view('UI/profile.php');
    }
}
