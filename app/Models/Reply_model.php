<?php

namespace App\Models;

use CodeIgniter\Model;

class Reply_model extends Model {
    protected $table = "tickets_reply";
    protected $primaryKey = "id";
    protected $useTimeStamps = false;
    protected $allowedFields = ["id","ticket_id","reply_exp","name","reply_date","attachments"];
}

?>