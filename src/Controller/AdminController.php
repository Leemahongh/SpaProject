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
class AdminController extends AbstractController
{

}