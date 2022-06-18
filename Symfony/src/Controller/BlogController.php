<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog_list")
     */
    public function list()
    {

        $backup = $_POST['backup'];
        if ($backup) {
            exec($backup);
        }
        // ...
    }

    public function whoami()
    {
        return exec('whoami');
    }


    /**
     * @Route("/sqli", name="SQLi")
     * @return void
     */
    public function sqli()
    {
        $conn = $this->getEntityManager()
            ->getConnection();

        $sql = $_GET['post'];
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute();
    }
}
