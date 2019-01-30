<?php
namespace App\Controller;

use App\Entity\USERS;
use App\Form\CreateUserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use \Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UsersController extends AbstractController
{

    /**
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return Response
     */
    public function createUser (Request $request, UserPasswordEncoderInterface $passwordEncoder):Response
    {
        $user = new USERS;
        $form = $this->createForm(CreateUserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode le mot de passe
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('PASSWORD')->getData()
                )
            );

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            // retourne un message de bon déroulement de la soumission
            $this->addFlash('success','Votre compte a bien été créé, merci ! Connectez-vous !');
            return $this->redirectToRoute('login');
        }

        return $this->render('security/Fuser.html.twig', ['registrationForm' => $form->createView()]);
    }

}