<?php
namespace App\Controller;

use App\Entity\USERS;
use App\Repository\USERSRepository;
use App\Form\CreateUserType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use \Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @property ObjectManager em
 */
class UsersController extends AbstractController
{

    private $repository;

    /**
     * UsersController constructor.
     * @param USERSRepository $repository
     * @param ObjectManager $em
     */
    public function __construct(USERSRepository $repository, ObjectManager $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return Response
     */
    public function createUser (Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
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
            return $this->redirectToRoute('home');
        }

        return $this->render('security/Fuser.html.twig', ['registrationForm' => $form->createView()]);
    }

    /**
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return Response
     */
    public function editprofileUser (Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {

        $user = $this->get('security.token_storage')->getToken()->getUser();
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

            $this->em->flush();

            // retourne un message de bon déroulement de la soumission
            $this->addFlash('success','Votre compte a bien été modifié, merci !');
            return $this->redirectToRoute('home');
        }

        return $this->render('security/Muser.html.twig', ['registrationForm' => $form->createView()]);
    }

}