<?php

namespace App\Http\Controllers;

class FalsePositiveController extends Controller
{
    public function a()
    {
        exec($_GET['command']);
    }

    public function b()
    {
        include $_POST['view'];
    }
}
