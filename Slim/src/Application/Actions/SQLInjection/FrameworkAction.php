<?php

namespace App\Application\Actions\SQLInjection;

use App\Application\Actions\Action;
use mysqli;
use Psr\Http\Message\ResponseInterface as Response;

class FrameworkAction extends Action
{
    protected function action(): Response
    {
        $body = $this->request->getParsedBody();

        if ($body['query']) {
            $mysqli = new mysqli("example.com", "user", "password", "database");
            $mysqli->query($body['query']);
        }
    }
}
