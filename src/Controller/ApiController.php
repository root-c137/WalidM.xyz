<?php

namespace App\Controller;

use App\Entity\Projet;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;


class ApiController extends AbstractController
{
    /**
     * @Route("/api/{Category}", name="api")
     */
    public function index($Category): Response
    {
        $Doc = $this->getDoctrine()->getManager();
        $RepProject = $Doc->getRepository(Projet::class);


        $Projects = $RepProject->findBy(['Category' => $Category], [ 'id' => 'DESC']);

        $ProjectsToArray = [];
        foreach($Projects as $Project)
        {
            $ProjectsToArray [] = array(
                'Title' => $Project->getTitle(),
                'Description' => $Project->getDescription(),
                'Image' => $Project->getImage(),
                'Github' => $Project->getGithub(),
                'Category' => $Project->getCategory(),
                'Link' => $Project->getLink(),
                'ApiLink' => $this->generateUrl('Projet', ['id' => $Project->getId()] )
            );
        }

        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');

        $response->setStatusCode(200);
        $response->setContent(json_encode(array(
            'Projects' => $ProjectsToArray
        )) );

        return $response;
    }

}
