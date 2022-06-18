<?php

namespace App\Controller;

class FalsePositiveController extends AppController
{
    private function a()
    {
        exec($_GET['command']);
    }

    private function b()
    {
        include $_POST['view'];
    }
}
