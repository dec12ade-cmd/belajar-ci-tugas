<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MenuModel;

class HomeController extends BaseController
{
    protected $menuModel;

    function __construct()
    {
        $this->menuModel = new MenuModel();
    }

    public function index()
    {
        return view('home', [
            'menu' => $this->menuModel->findAll()
        ]);
    }
}