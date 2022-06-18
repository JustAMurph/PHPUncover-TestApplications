<?php

namespace App\Application\Actions\CommandInjection;

use App\Application\Actions\Action;
use Psr\Http\Message\ResponseInterface;

class FrameworkAction extends Action
{
    protected function action(): ResponseInterface
    {
        $params = $this->request->getQueryParams();

        if (!isset($params['command'])) {
            $this->response->getBody()->write('Error!');
            return $this->response;
        }

        $result = exec($params['command']);

        $this->response->getBody()->write('Ok!');
        return $this->response;
    }
}
