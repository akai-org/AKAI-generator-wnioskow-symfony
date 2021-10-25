<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class MainController extends AbstractController
{

    public function index():Response
    {
        $test = 123456789;
        return $this->render('base.html.twig', [
            'test' => $test
        ]);

    }

}