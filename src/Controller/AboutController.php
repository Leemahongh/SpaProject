<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class AboutController extends Controller
{

    /**
     * AboutController constructor.
     * @var Environment
     */

    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }


    public function index ():Response
    {
        return $this->render('pages/about.html.twig');
    }


}