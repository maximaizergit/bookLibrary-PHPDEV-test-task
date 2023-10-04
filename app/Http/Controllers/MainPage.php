<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainPage extends Controller
{
    public function index(): string
    {
        return 'Hello, World';
    }
}
