<?php

namespace App\Controllers;

class Pages extends BaseController
{
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $data['destinasi'] = $this->db->table("tb_gambar")->get()->getResultArray();
        return view('pages/home', $data);
    }

    public function about()
    {
        return view('pages/about');
    }

    //--------------------------------------------------------------------

}
