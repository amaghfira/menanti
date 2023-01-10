<?php

namespace App\Controllers;

use App\Models\Reply_model;
use App\Models\Ticket_model;
use CodeIgniter\Controller;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Autoloader\Helper;

class TiketUser extends User {
    public function __construct()
    {
        $this->session = session();
        $this->db = \Config\Database::connect();
    }
    public function index() {
        // get session data 
        $username = $_SESSION['username'];
        $role = $_SESSION['role'];
        $name = $_SESSION['nama'];


        // show tiket lists

        $query = $this->db->query("SELECT t.*, s.name as nama_status FROM tickets t, statuses s WHERE t.status_id=s.id AND t.username = '$username'");
        $data['tickets'] = $query->getResultArray();

        // layout
        echo view("layout/header");
        echo view("layout/navbar");
        echo view("layout/sidebar");
        echo view("user/ticket_lists",$data);
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
        echo view("user/ticket_edit",$data);
        echo view("layout/footer");
    }

    public function view($id) { //menampilkan view masing2 tiket (tp cuma view aja gabisa di edit)
        $db = \Config\Database::connect();

        $ticketModel = new Ticket_model();
        $replyModel = new Reply_model();

        // $data['ticket'] = $ticketModel->where([
        //     'id' => $id
        // ])->first();

        $tiketquery = $db->query("SELECT t.*, s.name as nama_status FROM `tickets` t, statuses s WHERE t.id = '$id' AND t.status_id = s.id ");
        $data['ticket'] = $tiketquery->getRowArray();
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
        echo view("user/ticket_view",$data);
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
        $bmn = $this->request->getPost('bmn');
        
        $datanew = [
            'title' => $title,
            'content' => $content,
            'no_bmn' => $bmn,
            'status_id' => $status,
            'author_name' => $authorName,
            'author_email' => $authorEmail,
            'updated_at' => $updated_at,
            'solver' => $solver_name
        ];
        
        $datakomen = [
            'ticket_id' => $ticket_id,
            'reply_exp' => $reply_exp,
            'name' => $authorName,
            'reply_date' => $reply_date
        ];

        
        $to = [];
        // $to = ['aulia.maghfira15@gmail.com'];
        $subject = $authorName . ' telah menambahkan komentar';
        $message = $authorName . '<p> telah menambahkan komentar. Cek di https://bpskaltim.com/siyanti.</p>' ;

        if($ticketModel->update($id, $datanew)) {
            if ($reply_exp == null) {
                session()->setFlashdata('pesan', 'Tiket berhasil di update');
                session()->setFlashdata('alert-class','alert-success');
            } else {
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
            }
        } else {
            session()->setFlashdata('pesan', 'Tiket gagal di update');
            session()->setFlashdata('alert-class', 'alert-danger');
        }

        return redirect('user/ticket');
    }

    public function delete($id) { //fungsi untuk hapus tiket 
        $ticketModel = new Ticket_model();
        $ticketModel->delete($id);
        return redirect('user/ticket');
    }

    public function add() { // fungsi untuk menampilkan form add ticket
        $nama = $this->session->get('nama');
        $username = $this->session->get('username');
        $query = $this->db->query("SELECT a.*,p.email as email FROM autentifikasi a, master_pegawai p WHERE username='$username' AND a.niplama=p.niplama");
        $data['nama'] = $nama;
        $data['auth'] = $query->getRowArray();
        // layout
        echo view("layout/header");
        echo view("layout/navbar");
        echo view("layout/sidebar");
        echo view("user/ticket_add", $data);
        echo view("layout/footer");
    }
    
    function sendMail() { 
        $to = $this->request->getVar('mailTo');
        $subject = $this->request->getVar('subject');
        $message = $this->request->getVar('message');
        
        $email = \Config\Services::email();

        $email->setTo($to);
        $email->setFrom('csti6400@gmail.com', 'Sistem Pelayanan TI 6400');
        
        $email->setSubject($subject);
        $email->setMessage($message);

        if ($email->send()) 
		{
            echo 'Email successfully sent';
        } 
		else 
		{
            $data = $email->printDebugger(['headers']);
            print_r($data);
        }
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
        // $created = date($format);
        $solver_name = $this->request->getPost('solver_name'); 
        $reply_exp = $this->request->getPost('comment');
        $created = date($format);
        // $created = $created->toDateTimeString();
        $username = session('username');
        $bmn = $this->request->getPost('bmn');
        
        $datanew = [
            'title' => $title,
            'content' => $content,
            'status_id' => 1,
            'no_bmn' =>$bmn,
            'author_name' => $authorName,
            'author_email' => $authorEmail,
            'created_at' => $created,
            'solver' => $solver_name,
            'category_id' => $category,
            'username' => $username
        ];
        
        // $datakomen = [
        //     'name' => $solver_name,
        //     'reply_date' => $reply_date
        // ];

        

        if($ticketModel->insert($datanew)) {
            // $replyModel->insert($datakomen);
            session()->setFlashdata('pesan_add_tiket', 'Tiket berhasil ditambahkan');
            session()->setFlashdata('alert-class','alert-success');

            // kirim email on submit
            $to = [];
            // $to = [];
            $subject = 'Permintaan Tiket Baru';
            $message = '
            <p>Hai, Kamu mendapatkan 1 tiket baru.</p>' . 
            '<p>Pemohon: ' . $authorName . '</p>' .
            '<p>Permasalahan: </p>' . $title . 
            '<p>Selengkapnya kunjungi <a>' . base_url() . '</p>';

            $email = \Config\Services::email();

            $email->setTo($to);
            $email->setFrom('your.email@gmail.com', 'Sistem Pelayanan TI 6400');
            
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

        } else {
            session()->setFlashdata('pesan_add_tiket', 'Tiket gagal ditambahkan');
            session()->setFlashdata('alert-class', 'alert-danger');
        }

        return redirect('user/ticket');
    }

    
}

?>
