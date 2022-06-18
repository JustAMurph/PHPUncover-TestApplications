<?php

namespace App\Application\Actions\LFI;

use App\Application\Actions\Action;
use Psr\Http\Message\ResponseInterface;

class FrameworkAction extends Action
{
    protected function action(): ResponseInterface
    {
        $params = $this->request->getQueryParams();

        if ($params['view']) {
            include $params['view'];
        }

        $this->response->getBody()->write('Ok!');
        return $this->response;
    }
}
