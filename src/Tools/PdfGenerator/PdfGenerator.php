<?php

namespace App\Tools\PdfGenerator;

interface PdfGenerator
{
    public function setVariable(string $key, string $value): self;

    public function setListVariable(string $key, array $values): self;

    public function generate(string $outputName): string;
}