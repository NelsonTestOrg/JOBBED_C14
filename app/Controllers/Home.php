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
    public function request()
    {
        return view('UI/request.php');
    }
    public function categories()
    {
        return view('UI/categories.php');
    }
    public function logout()
    {
        $session = session();
        session_unset();
        $session->destroy();
        return view('UI/home');
    }
    public function browseJobs(){
        return view('UI_worker/browseJobs.php');
    }
    public function activeJobs(){
        return view('UI_worker/activeJobs.php');
    }
    public function jobRequests(){
        return view('UI_worker/jobRequests.php');
    }
}
