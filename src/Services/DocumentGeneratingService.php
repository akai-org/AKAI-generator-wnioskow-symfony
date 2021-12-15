<?php

namespace App\Services;

use App\Entity\Document;
use App\Tools\PdfGenerator;

class DocumentGeneratingService
{
    /** @var PdfGenerator */
    private $generator;

    public function __construct(PdfGenerator $generator)
    {
        $this->generator = $generator;
    }

    public function getFromDocument(Document $document): string
    {
        
    }
}