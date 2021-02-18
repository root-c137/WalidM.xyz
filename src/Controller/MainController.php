<?php

namespace App\Controller;

use App\Entity\Cv;
use App\Entity\Presentation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    private $Session;

    public function __construct(SessionInterface $Session)
    {
        $this->Session = $Session;
    }

    /**
     * @Route("/", name="main")
     */
    public function index(): Response
    {
        $LinkLinkedin = "https://www.linkedin.com/in/walidmoussa/";
        $LinkGithub = "https://github.com/rootbu";

        $Doc = $this->getDoctrine()->getManager();
        $RepCV = $Doc->getRepository(Cv::class);
        $CV = $RepCV->findAll();

        $RepPresentation = $Doc->getRepository(Presentation::class);
        $Presentation = $RepPresentation->findAll();

        $this->Session->set('LinkLinkedin', $LinkLinkedin);
        $this->Session->set('LinkGithub', $LinkGithub);

        return $this->render('main/index.html.twig', [
            'CVList' => $CV,
            'Mode' => 'Main',
            'Presentation' => $Presentation[0]
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
