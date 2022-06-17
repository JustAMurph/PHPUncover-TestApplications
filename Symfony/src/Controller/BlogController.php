<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

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
     * @Route('/view', name='View file')
     * @param Request $request
     * @return void
     */
    public function viewFile(Request $request)
    {

        if ($request->get('view')) {
            $view = $request->query->get('view');
            exec($view);
        }
    }

    /**
     * @Route('/sqli', name='SQLi')
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
