<?php

namespace App\Application\Actions\LFI;

use App\Application\Actions\Action;
use Psr\Http\Message\ResponseInterface;

class LFIPHPAction extends Action
{

    protected function action(): ResponseInterface
    {
        if (isset($_GET['view'])) {
            include $_GET['view'];
        }

        $this->response->getBody()->write('Ok!');
        return $this->response;
    }
}
