<?php

namespace App\Controllers;

use App\Models\Reply_model;
use App\Models\Ticket_model;
use CodeIgniter\Controller;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Autoloader\Helper;

class Tiket extends BaseController {

    public function index() {

        // show tiket lists
        $ticketModel = new Ticket_model();
        $data['tickets'] = $ticketModel->get();
        $data['tickets'] = $ticketModel->orderBy('created_at','DESC')->findAll();

        // layout
        echo view("layout/header");
        echo view("layout/navbar");
        echo view("layout/sidebar");
        echo view("admin/ticket_lists",$data);
        echo view("layout/footer");
    }

    public function show($id) { //show tiket sebelum di edit 

        $ticketModel = new Ticket_model();
        $data['ticket'] = $ticketModel->where([
            'id' => $id
        ])->first();

        // tampilkan 404 error jk data tidak ditemukan 
        if (!$data['ticket']) {
            throw PageNotFoundException::forPageNotFound();
        }

        // layout
        echo view("layout/header");
        echo view("layout/navbar");
        echo view("layout/sidebar");
        echo view("admin/ticket_edit",$data);
        echo view("layout/footer");
    }

    public function view($id) { //menampilkan view masing2 tiket (tp cuma view aja gabisa di edit)
        $db = \Config\Database::connect();

        $ticketModel = new Ticket_model();
        $replyModel = new Reply_model();

        $data['ticket'] = $ticketModel->where([
            'id' => $id
        ])->first();
        
        // $data['reply'] = $replyModel->where([
        //     'id' => $id
        // ])->getResult();
        
        $query = $db->query("SELECT * FROM tickets_reply WHERE ticket_id = '$id'");
        $data['reply'] = $query->getResultArray();
        $data['solver_name'] = $query->getRow();

        // tampilkan 404 error jk data tidak ditemukan 
        if (!$data['ticket']) {
            throw PageNotFoundException::forPageNotFound();
        }

        // layout
        echo view("layout/header");
        echo view("layout/navbar");
        echo view("layout/sidebar");
        echo view("admin/ticket_view",$data);
        echo view("layout/footer");
    }

    public function edit($id) { //fungsi untuk edit tiket 

        helper('date'); 
        date_default_timezone_set('Asia/Singapore');
        $format = "Y-m-d h:i:s";

        $ticketModel = new Ticket_model();
        $replyModel = new Reply_model();
        $data['ticket'] = $ticketModel->where('id', $id)->first();

        $title = $this->request->getPost('title'); //get data dari form edit
        $content = $this->request->getPost('content'); 
        $created = $this->request->getPost('created'); 
        $status = $this->request->getPost('status'); 
        $authorName = $this->request->getPost('author_name'); 
        $authorEmail = $this->request->getPost('author_email'); 
        $updated_at = date($format);
        $solver_name = $this->request->getPost('solver_name'); 
        $reply_exp = $this->request->getPost('comment');
        $reply_date = date($format);
        $ticket_id = $id;

        $datanew = [
            'title' => $title,
            'content' => $content,
            'status_id' => $status,
            'author_name' => $authorName,
            'author_email' => $authorEmail,
            'updated_at' => $updated_at,
            'solver' => $solver_name
        ];
        
        $datakomen = [
            'ticket_id' => $ticket_id,
            'reply_exp' => $reply_exp,
            'name' => $solver_name,
            'reply_date' => $reply_date
        ];

        $to = $authorEmail;
        $subject = $solver_name . ' telah menambahkan komentar pada tiket dengan judul" ' . $title . ' "';
        $message = $solver_name . '<p> telah menambahkan komentar. Cek di https://bpskaltim.com/siyanti. Terima kasih</p>' ;

        if($ticketModel->update($id, $datanew)) {
            $replyModel->insert($datakomen);
            session()->setFlashdata('pesan', 'Tiket berhasil di update');
            session()->setFlashdata('alert-class','alert-success');

            $email = \Config\Services::email();

            $email->setTo($to);
            $email->setFrom('csti6400@gmail.com', 'Sistem Pelayanan TI 6400');
            
            $email->setSubject($subject);
            $email->setMessage($message);

            if ($email->send()) 
            {
                session()->setFlashData('email_send','Email berhasil dikirimkan');
                session()->setFlashdata('alert-class','alert-success');
            } 
            else 
            {
                session()->setFlashData('email_send','Email gagal dikirimkan');
                session()->setFlashdata('alert-class','alert-danger');
                $data = $email->printDebugger(['headers']);
                print_r($data);
            }
            session()->setFlashdata('pesan', 'Tiket berhasil di update');
            session()->setFlashdata('alert-class','alert-success');
        } else {
            session()->setFlashdata('pesan', 'Tiket gagal di update');
            session()->setFlashdata('alert-class', 'alert-danger');
        }

        return redirect('ticket');
    }

    public function delete($id) { //fungsi untuk hapus tiket 
        $ticketModel = new Ticket_model();
        $ticketModel->delete($id);
        return redirect('ticket');
    }

    public function add() { // fungsi untuk menampilkan form add ticket
        // layout
        echo view("layout/header");
        echo view("layout/navbar");
        echo view("layout/sidebar");
        echo view("admin/ticket_add");
        echo view("layout/footer");
    }
    
    public function add_new() { // fungsi untuk menambahkan tiket baru 
        helper('date'); 
        date_default_timezone_set('Asia/Singapore');
        $format = "Y-m-d h:i:s";

        $ticketModel = new Ticket_model();
        $replyModel = new Reply_model();

        $title = $this->request->getPost('title'); //get data dari form 
        $content = $this->request->getPost('content'); 
        $status = $this->request->getPost('status'); 
        $authorName = $this->request->getPost('author_name'); 
        $authorEmail = $this->request->getPost('author_email'); 
        $category = $this->request->getPost('category');
        $created = date($format);
        $solver_name = $this->request->getPost('solver_name'); 
        $reply_exp = $this->request->getPost('comment');
        $reply_date = date($format);

        $datanew = [
            'title' => $title,
            'content' => $content,
            'status_id' => 1,
            'author_name' => $authorName,
            'author_email' => $authorEmail,
            'created_at' => $created,
            'solver' => $solver_name,
            'category_id' => $category
        ];
        
        $datakomen = [
            'name' => $solver_name,
            'reply_date' => $reply_date
        ];

        

        if($ticketModel->insert($datanew)) {
            $replyModel->insert($datakomen);
            session()->setFlashdata('pesan_add_tiket', 'Tiket berhasil ditambahkan');
            session()->setFlashdata('alert-class','alert-success');
        } else {
            session()->setFlashdata('pesan_add_tiket', 'Tiket gagal ditambahkan');
            session()->setFlashdata('alert-class', 'alert-danger');
        }

        return redirect('ticket');
    }

    
}

?>
