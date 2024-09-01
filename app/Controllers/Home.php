<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo view('inc/vistaslte/head');
        echo view('inc/vistaslte/menu');
     //    echo view('inc/login', $data); // Cambia 'inc/login' por la ruta correcta si es necesario
        echo view('inc/vistaslte/test');
        echo view('inc/vistaslte/footer');
    }
}
