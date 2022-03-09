<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home'
        ];
        echo view('pages/home', $data);
    }
    
    public function contact()
    {
        $data = [
            'title' => 'Contact'
        ];

        echo view('pages/contact', $data);
    }
}
