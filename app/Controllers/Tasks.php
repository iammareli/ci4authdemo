<?php

namespace App\Controllers;

class Tasks extends BaseController
{
    public function index(): string
    {
        return view('tasks/index', [
            'username' => session()->get('username'),
        ]);
    }
}