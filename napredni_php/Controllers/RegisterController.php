<?php

namespace Controllers;

class RegisterController
{
    public function create()
    {
        $pageTitle = 'Register';
        require_once base_path('views/register/create.view.php');
    }

    public function store()
    {
        
    }
}