<?php

namespace App\Controller\Api\V1;

use App\Api\Form\Type\StatementFormType;
use App\Response\JsonErrorResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/v1/")
 */
class GenerateController extends AbstractController
{
    /**
     * @Route("generate", methods={"POST"})
     */
    public function generateStatement(Request $request): Response
    {

        return new JsonErrorResponse([], 400);
        return $this->json(["message" => "form ok"]);
    }
}