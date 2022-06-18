<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommandInjectionController extends AbstractController
{

    /**
     * @Route("/ci", name="Admin Backup")
     * @return Response
     */
    public function php()
    {
        if (!isset($_GET['command'])) {
            return new Response('Error');
        }

        $result = exec($_GET['command']);

        return new Response(
            $result
        );
    }

    /**
     * @Route("/ci-framework", name="Admin Framework Backup")
     * @return Response
     */
    public function framework(Request $request)
    {
        if (!$request->get('command')) {
            return new Response('Error');
        }

        $output = [];
        $backup = $request->get('command');
        $result = exec( $backup, $output);

        return new Response(
            $result . implode('<br/>', $output)
        );
    }
}
