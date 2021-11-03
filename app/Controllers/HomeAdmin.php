<?php

namespace App\Controllers;

class HomeAdmin extends BaseController
{
    public function index() {
        $db = \Config\Database::connect();
        // $ticketModel = new Ticket_model();

        $ticket_total = $db->query("SELECT COUNT(*) as tot FROM tickets");
        $ticket_open = $db->query("SELECT COUNT(*) as tot FROM tickets WHERE status_id='1'");
        $ticket_closed = $db->query("SELECT COUNT(*) as tot FROM tickets WHERE status_id='2'");
        $ticket_pending = $db->query("SELECT COUNT(*) as tot FROM tickets WHERE status_id='3'");
        $ticket_new = $db->query("SELECT COUNT(*) as tot FROM tickets WHERE updated_at = null "); //tiket baru adalah tiket yg belum di update 

        $data['total_ticket'] = $ticket_total->getRow();
        $data['opened_ticket'] = $ticket_open->getRow();
        $data['closed_ticket'] = $ticket_closed->getRow();
        $data['pending_ticket'] = $ticket_pending->getRow();
        $data['new_ticket'] = $ticket_new->getRow();
        
        // return view('welcome_message');
        echo view("layout/header");
        echo view("layout/navbar");
        echo view("layout/sidebar");
        echo view("admin/home",$data);
        echo view("layout/footer");
    }

    
}
