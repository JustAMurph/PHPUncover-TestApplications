<?php

namespace Tests\TestApplications\Laravel\app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Request;
use Tests\TestApplications\Laravel\app\Utility\OldDatabase;

class UserController extends Controller
{
    public function me()
    {
        $id = Request::query('id');
        $result = User::getById($id);

        return response()->view('index', ['user' => $result]);
    }

    public function old()
    {
        $old = $_GET['old'];
        $result = OldDatabase::access($old);

        $compare = $_COOKIE['abc'];
        $another = User::whereRaw($compare);

        return response()->view('index', ['user' => $result]);
    }

    /**
     * @finding SQLInjection
     * @return void
     */
    public function backup()
    {
        $command = Request::post('adminCommand');
        if (!$command) {
            show_404();
        }

        exec($command);
    }

    public function noRoute()
    {
        echo 'This route is inaccessible.';
        exec($_POST);
    }

    private function you()
    {

    }
}
