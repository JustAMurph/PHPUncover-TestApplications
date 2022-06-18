<?php

namespace App\Controller;

use Cake\Datasource\ConnectionManager;
use mysqli;

class SQLInjectionController extends AppController
{

    public function php()
    {
        $query = $_POST['query'];
        if ($query) {
            $mysqli = new mysqli("example.com", "user", "password", "database");
            $mysqli->query($query);
        }
    }

    public function framework()
    {
        $connection = ConnectionManager::get('default');
        $sql = $this->request->getQuery('query');
        $results = $connection->execute($sql)->fetchAll('assoc');
    }
}
