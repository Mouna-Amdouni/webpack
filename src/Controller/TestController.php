<?php


namespace App\Controller;


use App\Repository\CategorieRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{

    /**
     * @Route("/test1",name="test1")
     */
    public function index(){
        return $this->render("bazz.html.twig");
    }


}
