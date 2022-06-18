<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SQLInjectionController extends Controller
{
    public function php()
    {
        $query = $_POST['query'];
        if ($query) {
            $mysqli = new mysqli("example.com", "user", "password", "database");
            $mysqli->query($query);
        }

        return response('Ok!');
    }

    public function framework(Request $request)
    {
        $query = $request->post('query');
        DB::statement($query);
    }
}
