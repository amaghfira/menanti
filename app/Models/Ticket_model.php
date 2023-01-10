<?php

namespace App\Models;

use CodeIgniter\Model;

class Ticket_model extends Model {
    protected $table = "tickets";
    protected $primaryKey = "id";
    protected $useTimeStamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $allowedFields = ["title","content","no_bmn","status_id","author_name","author_email","created_at","updated_at","solver","username","category_id"];
}

?>