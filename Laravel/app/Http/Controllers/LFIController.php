<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LFIController extends Controller
{

    public function php()
    {
        $default = 'view.php';

        if (isset($_GET['view'])) {
            include $_GET['view'];
        }

        return response('Ok!');
    }

    public function framework(Request $request)
    {
        $default = 'view.php';

        if ($request->get('view')) {
            include $request->get('view');
        }

        return response('Ok!');
    }
}
