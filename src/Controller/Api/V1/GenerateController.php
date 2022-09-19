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
        $form = $this->createForm(StatementFormType::class, null, [
            "csrf_protection" => false,
        ]);
        $form->submit(json_decode($request->getContent(), true));

        if (!$form->isSubmitted() || !$form->isValid()) {
            $errorMessages = [];
            foreach ($form->getErrors(true) as $error) {
                $errorMessages[] = $error->getMessage();
            }
            return new JsonErrorResponse($errorMessages, 400);
        }



        return $this->json(["message" => "form ok"]);
    }
}