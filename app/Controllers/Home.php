<?php

namespace App\Controllers;

use App\Models\MenuModel; 

class Home extends BaseController
{
    protected $menuModel;
    function __construct(){
    $this->menuModel = new MenuModel();
}

    public function index(): string
    {
        return view('home', [
	'menu' => $this->menuModel->findAll()
]);
    }
}
