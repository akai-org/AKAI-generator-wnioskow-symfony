<?php

namespace App\Response;

use Symfony\Component\HttpFoundation\JsonResponse;
use Webmozart\Assert\Assert;

class JsonErrorResponse extends JsonResponse
{
    private const ERROR_CODE_LOWER_LIMIT = 400;

    public function __construct(array $errors, int $status, array $headers = [], bool $json = false)
    {
        Assert::greaterThanEq($status, self::ERROR_CODE_LOWER_LIMIT);
        $data = [
            "errors" => $errors,
        ];
        parent::__construct($data, $status, $headers, $json);
    }
}