<?php

namespace App\Controllers;

use App\Models\User_model;

class Login extends BaseController {

    public function index() {
        return view('login');
    }
    public function process()  {
        $users = new User_model();
        $username = $this->request->getVar('username'); //get data dari form login
        $password = $this->request->getVar('password') ;
        $dataUser = $users->where([
            'username' => $username
        ])->first();

        if ($dataUser) {
            if (password_verify($password, $dataUser->user_pass)) {
                session()->set([
                    'username' => $dataUser->username,
                    'name' => $dataUser->name,
                    'logged_in' => TRUE
                ]);
                session()->setFlashdata('success', 'Selamat Datang di SIYANTI');
                return redirect()->to(base_url('home'));
            } else {
                session()->setFlashdata('error', 'Username dan Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error','Username dan Password Salah');
            return redirect()->back();
        }
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/login');
    }
}

?>