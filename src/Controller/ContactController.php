<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Classes\Mail;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validator\ValidatorInterface;


class ContactController extends AbstractController
{
    /**
 * @Route("/contact", name="contact")
 */
    public function index(): Response
    {
        $Contact = new Contact();
        $Form = $this->createForm(ContactType::class, $Contact, [
            'action' => $this->generateUrl('newcontact'),
            'method' => 'POST'
        ]);

        return $this->render('contact/index.html.twig', [
            'Form' => $Form->createView()
        ]);
    }

    /**
     * @Route("/NewMessage", name="newcontact")
     */
    public function NewMessage(Request $Request, ValidatorInterface $Validator): Response
    {

        //On récupère le form en lui donnant la classe liée..
        $Contact = new Contact();
        $Form = $this->createForm(ContactType::class, $Contact);


        //On vérifie si le mail est correct..
        $EmailConstraint = new Assert\Email();
        $EmailConstraint->message = "L'adresse mail n'est pas valide..";
        $Errors = $Validator->validate($_POST['contact']['mail'], $EmailConstraint);

        $Form->handleRequest($Request);

        if($Form->isSubmitted() && $Form->isValid() && 0 === count($Errors) )
        {
            $Doc = $this->getDoctrine()->getManager();
            $RepContact = $Doc->getRepository(Contact::class);

            $Contact = $Form->getData();
            $Contact->setIp($_SERVER['REMOTE_ADDR']);
            $Contact->setCreatedAt(new DateTime());

            $Doc->persist($Contact);
            $Doc->flush();

            $this->addFlash("Notice", "Votre message à bien été envoyé." );
        }
        else
        {
            $this->addFlash("Err", $Errors[0]->getMessage() );
        }

        return $this->redirectToRoute('contact');
    }

}
