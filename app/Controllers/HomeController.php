<?php
namespace App\Controllers;

use App\views\View;

class HomeController
{
    static function index()
    {
        View::render('layouts/index');
    }
}
?>