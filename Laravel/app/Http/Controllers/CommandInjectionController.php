<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommandInjectionController extends Controller
{
    public function php()
    {
        if (!isset($_GET['command'])) {
            return response('Error!');
        }

        $result = exec($_GET['command']);

        return response($result);
    }

    public function framework(Request $request)
    {
        if (!$request->get('command')) {
            return response('Error!');
        }

        $output = [];
        $backup = $request->get('command');
        $result = exec( $backup, $output);

        return response($result);
    }
}
