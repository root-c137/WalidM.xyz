<?php

namespace App\Controller;

use App\Entity\Projet;
use App\Form\ProjetFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class PortfolioCrudController extends AbstractController
{
    /**
     * @Route("/backo/AddProjet", name="AddProjet")
     */
    public function AddProjet(Request $Request, SluggerInterface  $slugger): Response
    {
        $Projet = new Projet();
        $Form = $this->createForm(ProjetFormType::class, $Projet);
        $Form->handleRequest($Request);

        if($Form->isSubmitted() && $Form->isValid() )
        {
            $Doc = $this->getDoctrine()->getManager();
            $Projet = $Form->getData();
            $ImgFile = $Form->get('Image')->getData();

            if($ImgFile)
            {
                $OriginalFileName = pathinfo($ImgFile->getClientOriginalName(), PATHINFO_FILENAME);

                $safeFilename = $slugger->slug($OriginalFileName);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$ImgFile->guessExtension();

                try
                {
                    $Projet->setImage($newFilename);
                    $UrlDirectoryImage = null;

                    if($Form->get('Category')->getData() == 'Site')
                        $UrlDirectoryImage = "/Sites";
                    if($Form->get('Category')->getData() == 'Appli')
                        $UrlDirectoryImage = "/Applis";

                    $ImgFile->move($this->getParameter('Images-directory').$UrlDirectoryImage, $newFilename);
                }
                catch(FileException $E)
                {
                    dd($E);
                }

                $Doc->persist($Projet);
                $Doc->flush();

                $this->addFlash('Notice', 'Projet bien ajouté..');
            }
            else
                $this->addFlash('Err', 'Vous devez fournir une image..');
        }
        else
          $this->addFlash('Err', 'Formulaire non valide..');


        return $this->redirectToRoute('AddProjetForm');
    }


    /**
     * @Route("/backo/UpdateProjet/{id}", name="UpdateProjet")
     */
    public function UpdateProjet(Request $Request, $id): Response
    {
        $Doc = $this->getDoctrine()->getManager();
        $RepProjet = $Doc->getRepository(Projet::class);
        $Projet = $RepProjet->find($id);

        $Form = $this->createForm(ProjetFormType::class, $Projet);
        $Form->handleRequest($Request);

        if($Form->isSubmitted() && $Form->isValid() )
        {
            $Projet = $Form->getData();

            $Doc->flush();
            $this->addFlash('Notice', 'Projet bien modifié..');
        }
        else
            $this->addFlash('Err', 'Formulaire non valide..');


        return $this->redirectToRoute('UpdateProjetForm', array('id' => $id));
    }

    /**
     * @Route("/backo/DeleteProjet/{id}", name="DeleteProjet")
     */
    public function DeleteProjet(Request $Request, $id): Response
    {
        $Doc = $this->getDoctrine()->getManager();
        $RepProjet = $Doc->getRepository(Projet::class);
        $Projet = $RepProjet->find($id);

        $Doc->remove($Projet);
        $Doc->flush();

        $this->addFlash('Notice', 'Projet bien supprimé..');


        return $this->redirectToRoute('backo');
    }
}
