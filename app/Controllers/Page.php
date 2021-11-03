<?php

namespace App\Controllers;

class Page extends BaseController {

    public function about() {
        echo "About";
    }

    public function contact() {
        $data["nama"] = "Aulia Maghfira";
        echo view("contact",$data);

    }

    public function faqs() {
        $data["data_faqs"] = [
            [
                'ques' => 'apa itu kucing?',
                'ans' => 'hewan'
            ],
            [
                'ques' => 'apa itu ayam?',
                'ans' => 'hewan juga'
            ]
        ];

        // tampilkan view dg data 
        echo view("ques", $data);
    }

}

?>