<?php

namespace App\Controller\Api\V1;

use App\Api\Form\Dto\StatementForm;
use App\Entity\Achievement;
use App\Entity\Club;
use App\Entity\Document;
use App\Entity\Student;
use App\Response\JsonErrorResponse;
use App\Services\DocumentGeneratingService;
use DateTimeImmutable;
use PHPUnit\Util\Json;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @Route("/api/v1/")
 */
class GenerateController extends AbstractController
{
    private Serializer $serializer;
    private ValidatorInterface $validator;
    private DocumentGeneratingService $service;

    public function __construct(SerializerInterface $serializer, ValidatorInterface $validator, DocumentGeneratingService $service)
    {
        $this->serializer = $serializer;
        $this->validator = $validator;
        $this->service = $service;
    }

    /**
     * @Route("generate", methods={"POST"})
     */
    public function generateStatement(Request $request): Response
    {
        try {
            /** @var StatementForm $statementForm */
            $statementForm = $this->serializer->deserialize($request->getContent(), StatementForm::class, 'json');
        } catch (\Exception $e) {
            return new JsonErrorResponse(["json" => $e->getMessage()], 400);
        }

        $errors = $this->validator->validate($statementForm);
        if ($errors->count() > 0) {
            $messages = [];
            foreach ($errors as $error) {
                /** @var ConstraintViolation $error */
                $message = explode(" ", $error->getMessage(), 2);
                $messages[$message[0]] = $message[1];
            }
            return new JsonErrorResponse($messages, 400);
        }

        $document = $statementForm->getDocument();
        $generatedFile = $this->service->getFromDocument($document);

        $response = new Response($generatedFile);
        $disposition = $response->headers->makeDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            str_replace(" ", "_", $document->student()->name()). ".pdf"
        );
        $response->headers->set('Content-Disposition', $disposition);
        return $response;
    }
}