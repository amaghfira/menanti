<?php

namespace App\Models;

use CodeIgniter\Model;

class User_model extends Model {
    protected $DBGroup = "lk";
    protected $table = "autentifikasi";
    protected $primaryKey = "username";
    protected $useTimeStamps = false;
    protected $allowedFields = ["username","password","niplama"];
}

?>