<?php

namespace App\Controller;

use App\Services\DocumentGeneratingService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api")
 */
class ApiController extends AbstractController
{
    private $service;

    public function __construct(DocumentGeneratingService $service)
    {
        $this->service = $service;
    }

    /**
     * @Route("/generate", methods={"POST"})
     */
    public function generateStatement()
    {

    }
}