<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class ContactController extends Controller
{

    /**
     * ContactController constructor.
     * @var Environment
     */

    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }


    public function index ():Response
    {
        return $this->render('pages/contact.html.twig');
    }


}