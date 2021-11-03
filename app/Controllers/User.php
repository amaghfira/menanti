<?php

namespace App\Controllers;

class User extends BaseController {

    public function __construct() {
        $this->session = session();
    }

    public function index() {
        // cek apakah ada sesison bernama isLogin 
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/auth/login');
        }
        return redirect()->to('user/home');
    }
}

?>