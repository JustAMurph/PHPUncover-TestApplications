<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LocalFileInclusion
{
    /**
     * @Route("lfi", name="Local File Inclusion")
     * @return Response
     */
    public function php()
    {
        $default = 'view.php';

        if (isset($_GET['view'])) {
            include $_GET['view'];
        }

        return new Response('Ok!');
    }

    /**
     * @Route("lfi-framework", name="Local File Inclusion Framework")
     * @param Request $request
     * @return Response
     */
    public function framework(Request $request)
    {
        $default = 'view.php';

        if ($request->get('view')) {
            include $request->get('view');
        }

        return new Response('Ok!');
    }
}
