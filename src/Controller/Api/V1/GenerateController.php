<?php

namespace App\Controller\Api\V1;

use App\Api\Form\Dto\StatementForm;
use App\Response\JsonErrorResponse;
use PHPUnit\Util\Json;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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

    public function __construct(SerializerInterface $serializer, ValidatorInterface $validator)
    {
        $this->serializer = $serializer;
        $this->validator = $validator;
    }

    /**
     * @Route("generate", methods={"POST"})
     */
    public function generateStatement(Request $request): Response
    {
        try {
            $statementForm = $this->serializer->deserialize($request->getContent(), StatementForm::class, 'json');
        } catch (NotEncodableValueException $e) {
            return new JsonErrorResponse(["json" => "can't decode your message"], 400);
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

        var_dump($statementForm);
        die();
//        return $this->json(["message" => "form ok"]);
    }
}