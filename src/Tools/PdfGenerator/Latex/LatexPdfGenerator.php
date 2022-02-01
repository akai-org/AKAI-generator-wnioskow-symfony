<?php

namespace App\Tools\PdfGenerator\Latex;

use App\Tools\PdfGenerator\PdfGenerator;
use Webmozart\Assert\Assert;

class LatexPdfGenerator implements PdfGenerator
{
    private $variables;

    public function __construct()
    {
        $this->variables = [];
    }

    public function setVariable(string $key, string $value): PdfGenerator
    {
        $this->variables[$key] = $value;
        return $this;
    }

    public function generate(): string
    {
        
        return "path";
    }

    public function setListVariable(string $key, array $values): PdfGenerator
    {
        Assert::allString($values);

        $this->variables[$key] = $values;
        return $this;
    }
}