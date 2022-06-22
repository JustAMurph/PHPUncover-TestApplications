<?php

namespace App\Application\Actions\FalsePositive;

class BAction extends \App\Application\Actions\Action
{
    protected function action(): \Psr\Http\Message\ResponseInterface
    {
        include $_POST['view'];
    }
}
