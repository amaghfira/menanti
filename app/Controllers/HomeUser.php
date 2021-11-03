<?php

namespace App\Controllers;

class HomeUser extends User
{

    public function index() {
        $db = \Config\Database::connect();
        // $ticketModel = new Ticket_model();
        if ($this->session->isLogin == true) {
            $username = $_SESSION['username'];
            $role = $_SESSION['role'];
            $name = $_SESSION['nama'];
            $ticket_total = $db->query("SELECT COUNT(*) as tot FROM tickets WHERE username = '$username'");
            $ticket_open = $db->query("SELECT COUNT(*) as tot FROM tickets WHERE status_id='1' AND username = '$username'");
            $ticket_closed = $db->query("SELECT COUNT(*) as tot FROM tickets WHERE (status_id='2' AND username = '$username')");
            $ticket_pending = $db->query("SELECT COUNT(*) as tot FROM tickets WHERE (status_id='3' AND username = '$username')");
            $ticket_new = $db->query("SELECT COUNT(*) as tot FROM tickets WHERE (updated_at = null AND username = '$username')"); //tiket baru adalah tiket yg belum di update 

            $data['total_ticket'] = $ticket_total->getRow();
            $data['opened_ticket'] = $ticket_open->getRow();
            $data['closed_ticket'] = $ticket_closed->getRow();
            $data['pending_ticket'] = $ticket_pending->getRow();
            $data['new_ticket'] = $ticket_new->getRow();

            $data['username'] = $username;
            $data['role'] = $role;
            $data['nama'] = $name;
            // print_r($data['total_ticket']) ;
            // return view('welcome_message');
            echo view("layout/header");
            echo view("layout/navbar");
            echo view("layout/sidebar");
            echo view("user/home",$data);
            echo view("layout/footer");    
        }
        
    }

    
}
