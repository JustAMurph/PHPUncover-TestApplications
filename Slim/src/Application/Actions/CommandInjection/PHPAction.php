<?php

namespace App\Application\Actions\CommandInjection;

use App\Application\Actions\Action;
use Psr\Http\Message\ResponseInterface;

class PHPAction extends Action
{
    protected function action(): ResponseInterface
    {
        if (!isset($_GET['command'])) {
            $this->response->getBody()->write('Error!');
            return $this->response;
        }

        $result = exec($_GET['command']);

        $this->response->getBody()->write('Ok!');
        return $this->response;
    }
}
