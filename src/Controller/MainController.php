<?php

namespace App\Controller;

use App\Entity\Cv;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index(): Response
    {
        $Doc = $this->getDoctrine()->getManager();
        $RepCV = $Doc->getRepository(Cv::class);
        $CV = $RepCV->findAll();

        return $this->render('main/index.html.twig', [
            'CVList' => $CV,
            'Mode' => 'Main'
        ]);
    }

    /**
     * @Route("/Data/{Type}", name="GoData")
     */
    public function getData($Type): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }


}
