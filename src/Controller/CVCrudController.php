<?php

namespace App\Controller;

use App\Entity\Cv;
use App\Form\CvFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Sodium\add;

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

    /**
     * @Route("/backo/UpdateCv/{id}", name="UpdateCV")
     */
    public function UpdateCV(Request $Request, $id): Response
    {
        $Doc = $this->getDoctrine()->getManager();
        $RepCV = $Doc->getRepository(Cv::class);
        $Cv = $RepCV->find($id);

        $Form = $this->createForm(CvFormType::class, $Cv);
        $Form->handleRequest($Request);

        if($Form->isSubmitted() && $Form->isValid() )
        {

            $Cv = $Form->getData();
            $Doc->flush();

            $this->addFlash('Notice', 'Cette expérience à bien été modifier');
            return $this->redirectToRoute('UpdateCVForm', array('id' => $id) );
        }
        else
        {
            $this->addFlash('Err', 'Formulaire non valide..');
            return $this->redirectToRoute('UpdateCVForm', array('id' => $id) );
        }
    }
}
