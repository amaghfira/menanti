<?php

namespace App\Controllers;

class Admin extends BaseController {

    public function __construct() {
        $this->session = session();
    }

    public function index() {
        // cek apakah ada session bernama isLogin 
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/auth/login');
        }

        // cek user role dari session 
        if ($this->session->get('role') != '92600' || $this->session->get('role') != '92610' || $this->session->get('role') != '92620' || $this->session->get('role') != '92630') {
            return redirect()->to('/user');
        }

        return view('admin/home');
        
    }

}

?>