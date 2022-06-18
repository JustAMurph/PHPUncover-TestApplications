<?php

namespace App\Controller;

class CommandInjectionController extends AppController
{

    public function php()
    {
        if (!isset($_GET['command'])) {
            return $this->response->withStringBody(
            'Command not set');
        }

        $result = exec($_GET['command']);

        return $this->response->withStringBody($result);
    }

    public function framework()
    {
        $params = $this->request->getQueryParams();

        if (!isset($params['command'])) {
            return $this->response->withStringBody(
                'Command not set');
        }

        $result = exec($params['command']);
        return $this->response->withStringBody($result);
    }
}
