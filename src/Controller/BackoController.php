<?php

namespace App\Controller;

use App\Entity\Cv;
use App\Entity\Projet;
use App\Form\CvFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BackoController extends AbstractController
{
    /**
     * @Route("/backo", name="backo")
     */
    public function index(): Response
    {
        //On récup tout les cv..
        $Doc = $this->getDoctrine()->getManager();
        $RepCV = $Doc->getRepository(Cv::class);
        $CV = $RepCV->findAll();

        //On récup tout les portfolio..
        $RepXP = $Doc->getRepository(Projet::class);
        $Projets = $RepXP->findAll();



        return $this->render('backo/index.html.twig', [
            'CVList' => $CV,
            'Projets' => $Projets
        ]);
    }

    /**
     * @Route("/backo/ajouter-une-experience", name="AddCVForm")
     */
    public function AddCVForm(): Response
    {
        $Cv = new Cv();
        $Form = $this->createForm(CvFormType::class, $Cv, [
            'method' => 'POST',
            'action' => $this->generateUrl('AddCV')
        ]);

        return $this->render('backo/AddCvForm.html.twig',[
            'Form' => $Form->createView()
        ]);
    }
}
