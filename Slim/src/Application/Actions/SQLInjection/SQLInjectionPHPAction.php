<?php

namespace App\Application\Actions\SQLInjection;

use App\Application\Actions\Action;
use mysqli;
use Psr\Http\Message\ResponseInterface;

class SQLInjectionPHPAction extends Action
{
    protected function action(): ResponseInterface
    {
        $query = $_POST['query'];
        if ($query) {
            $mysqli = new mysqli("example.com", "user", "password", "database");
            $mysqli->query($query);
        }
    }
}
