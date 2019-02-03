<?php
namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Notification\ContactNotification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use \Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends AbstractController
{

    /**
     * @param Request $request
     * @param ContactNotification $notification
     * @return Response
     */
    public function contact (Request $request, ContactNotification $notification):Response
    {
        $contact = new contact;
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //notifie le contact par un mail
            $notification->notify($contact);
            // retourne un message de bon déroulement de la soumission
            $this->addFlash('success','Votre Message a bien été envoyé, nous vous répondrons dans les plus bref délais');
            return $this->redirectToRoute('home');
        }

        return $this->render('pages/contact.html.twig', ['form' => $form->createView()]);
    }

}