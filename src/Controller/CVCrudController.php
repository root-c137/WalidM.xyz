<?php

namespace App\Controller;

use App\Entity\Cv;
use App\Form\CvFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CVCrudController extends AbstractController
{
    /**
     * @Route("/backo/addcv", name="AddCV")
     */
    public function AddCV(Request $Request): Response
    {

        $Form = $this->createForm(CvFormType::class);
        $Form->handleRequest($Request);

        if($Form->isSubmitted() && $Form->isValid() )
        {
            $Cv = new Cv();
            $Doc = $this->getDoctrine()->getManager();

            $Cv = $Form->getData();
            $Doc->persist($Cv);
            $Doc->flush();

            return $this->redirectToRoute('AddCVForm');
        }
        else
        {
            return $this->redirectToRoute('AddCVForm');
        }
    }
}
