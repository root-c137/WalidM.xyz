<?php

namespace App\Controller;

use App\Entity\Cv;
use App\Entity\Projet;
use App\Form\CvFormType;
use App\Form\ProjetFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
            'Projets' => $Projets,
            'Mode' => 'Backo'
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
            'Form' => $Form->createView(),
            'Mode' => 'Add'
        ]);
    }


    /**
     * @Route("/backo/modifier-une-experience/{id}", name="UpdateCVForm")
     */
    public function UpdateCVForm($id): Response
    {
        $Doc = $this->getDoctrine()->getManager();
        $RepCv = $Doc->getRepository(Cv::class);
        $Cv = $RepCv->find($id);

        $Form = $this->createForm(CvFormType::class, $Cv, [
            'method' => 'POST',
            'action' => $this->generateUrl('UpdateCV', ['id' => $id])
        ]);

        return $this->render('backo/AddCvForm.html.twig',[
            'Form' => $Form->createView(),
            'Mode' => 'Update',
            'CV' => $Cv
        ]);
    }

    /**
     * @Route("/backo/ajouter-un-projet", name="AddProjetForm")
     */
    public function AddProjetForm(): Response
    {
        $Projet = new Projet();
        $Form = $this->createForm(ProjetFormType::class, $Projet, [
            'method' => 'POST',
            'action' => $this->generateUrl('AddProjet')
        ]);

        return $this->render('portfolio_crud/index.html.twig', [
            'Form' => $Form->createView(),
            'Mode' => 'Add'
        ]);
    }

    /**
     * @Route("/backo/modifier-un-projet/{id}", name="UpdateProjetForm")
     */
    public function UpdateProjetForm(Request $Request, $id): Response
    {
        $Doc = $this->getDoctrine()->getManager();
        $RepProjet = $Doc->getRepository(Projet::class);
        $Projet = $RepProjet->find($id);

        $Form = $this->createForm(ProjetFormType::class, $Projet, [
            'method' => 'POST',
            'action' => $this->generateUrl('UpdateProjet', ['id' => $id])
        ]);

        return $this->render('portfolio_crud/index.html.twig', [
            'Form' => $Form->createView(),
            'Projet' => $Projet,
            'Mode' => 'Update'
        ]);
    }


}
