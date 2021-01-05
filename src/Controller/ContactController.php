<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
    public function NewMessage(Request $Request): Response
    {
        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }

}
