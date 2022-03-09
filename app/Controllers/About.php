<?php

namespace App\Controllers;

class About extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'About'
        ];

        echo view('about/index', $data);
    }
}
