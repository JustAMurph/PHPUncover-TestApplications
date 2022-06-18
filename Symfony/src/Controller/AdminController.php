<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{

    /**
     * @Route("/backup", name="Admin Backup")
     * @return Response
     */
    public function backup()
    {
        if (!isset($_GET['backup'])) {
            return new Response('Error');
        }

        $result = exec('backup ' . $_GET['backup']);

        return new Response(
            $result
        );
    }

    /**
     * @Route("/framework-backup", name="Admin Framework Backup")
     * @return Response
     */
    public function framework_backup(Request $request)
    {
        if (!$request->get('backup')) {
            return new Response('Error');
        }

        $output = [];
        $backup = $request->get('backup');
        $result = exec( $backup, $output);

        return new Response(
            $result . implode('<br/>', $output)
        );

    }

}
