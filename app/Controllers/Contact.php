<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Contact extends BaseController
{
    public function index()
    {
        echo view('layout/header');
        echo view('layout/navbar');
        echo view('layout/sidebar');
        echo view('contact');
        echo view('layout/footer');
    }
}
