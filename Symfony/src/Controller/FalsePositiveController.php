<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FalsePositiveController extends AbstractController
{
    /**
     * @Route("fp-a", name="False Positive A")
     * @return void
     */
    public function a()
    {
        exec($_GET['command']);
    }

    /**
     * @Route("fp-b", name="False Postive B")
     * @return void
     */
    public function b()
    {
        include $_POST['view'];
    }
}
