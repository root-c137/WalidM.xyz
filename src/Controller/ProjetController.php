<?php

namespace App\Controller;

use App\Entity\Projet;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Asset\Package;
use Symfony\Component\Asset\UrlPackage;
use Symfony\Component\Asset\VersionStrategy\EmptyVersionStrategy;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjetController extends AbstractController
{
    /**
     * @Route("/projet/{id}", name="Projet")
     */
    public function index(Projet $id): Response
    {
        $Projet = $id;
        $package = new UrlPackage('file:///Uploads/', new EmptyVersionStrategy() );

        $ImgDirectory = null;
        if($Projet->getCategory() == 'Site')
            $ImgDirectory = "Sites/".$Projet->getImage();
        if($Projet->getCategory() == 'Appli')
            $ImgDirectory = "Applis/".$Projet->getImage();


        return $this->render('projet/index.html.twig', [
            'Projet' => $Projet,
            'ImageDirectory' => $ImgDirectory
        ]);
    }
}

