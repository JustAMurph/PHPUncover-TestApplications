<?php

namespace App\Controller;

class LFIController extends AppController
{

    public function php()
    {
        $default = 'view.php';

        if (isset($_GET['view'])) {
            include $_GET['view'];
        }

        return $this->response->withStringBody('Ok!');
    }

    public function framework()
    {
        if ($this->request->getQuery('view')) {
            include $this->request->getQuery('view');
        }

        return $this->response->withStringBody('Ok!');
    }
}
