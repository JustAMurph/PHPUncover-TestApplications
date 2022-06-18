<?php

namespace App\Controller;
use mysqli;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SQLInjectionController extends AbstractController
{
    /**
     * @Route("/sqli", name="blog_list")
     */
    public function php()
    {
        $query = $_POST['query'];
        if ($query) {
            $mysqli = new mysqli("example.com", "user", "password", "database");
            $mysqli->query($query);
        }

        return new Response('ok');
    }

    /**
     * @Route("/sqli-framework", name="SQLi")
     * @return void
     */
    public function framework()
    {
        $conn = $this->getEntityManager()
            ->getConnection();

        $sql = $_GET['query'];
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute();

        return new Response('ok');
    }
}
