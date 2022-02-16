<?php

namespace App\Services;

use App\Entity\Achievement;
use App\Entity\Document;
use App\Tools\PdfGenerator\PdfGenerator;
use App\Tools\PdfGenerator\StyledElementsFactory;

class DocumentGeneratingService
{
    private const DEPARTMENT_KEY = 'DEP';
    private const DATE_KEY = 'DATE';
    private const CLUB_NAME_KEY = 'CLUB-NAME';
    private const STUDENT_NAME_KEY = 'STUDENT-NAME';
    private const INDEX_NUMBER_KEY = 'INDEX-NUMBER';
    private const SEMESTER_KEY = 'SEMESTER';
    private const YEAR_KEY = 'YEAR';
    private const POSITION_KEY = 'FUNCTION';
    private const LEADER_NAME_KEY = 'LEADER-NAME';
    private const PATRON_NAME_KEY = 'PATRON-NAME';
    private const ACHIEVEMENT_LIST_KEY = 'ACHIEVEMENTS';

    private const DATE_FORMAT = 'Y-m-d';

    private const FILENAME_TEMPLATE = "zaswiadczenie_%s";

    /** @var PdfGenerator */
    private $generator;

    /** @var StyledElementsFactory */
    private $elementsFactory;

    public function __construct(
        PdfGenerator          $generator,
        StyledElementsFactory $elementsFactory
    )
    {
        $this->generator = $generator;
        $this->elementsFactory = $elementsFactory;
    }

    public function getFromDocument(Document $document): string
    {
        $filename = sprintf(self::FILENAME_TEMPLATE, str_replace(" ", "_", $document->student()->name()));
        return $this->generator
            ->setVariable(self::DEPARTMENT_KEY, $document->club()->departmentName())
            ->setVariable(self::DATE_KEY, date(self::DATE_FORMAT))
            ->setVariable(self::CLUB_NAME_KEY, $document->club()->name())
            ->setVariable(self::STUDENT_NAME_KEY, $document->student()->name())
            ->setVariable(self::INDEX_NUMBER_KEY, $document->student()->index())
            ->setVariable(self::SEMESTER_KEY, $document->student()->semester())
            ->setVariable(self::YEAR_KEY, $document->student()->academicYear())
            ->setVariable(self::POSITION_KEY, $document->student()->position())
            ->setVariable(self::LEADER_NAME_KEY, $document->club()->leaderName())
            ->setVariable(self::PATRON_NAME_KEY, $document->club()->patronName())
            ->setListVariable(self::ACHIEVEMENT_LIST_KEY, array_map(function (Achievement $achievement) {
                return (string)$this->elementsFactory->achievement(
                    $achievement->name(),
                    $achievement->startDate(),
                    $achievement->endDate()
                );
            }, $document->student()->achievements()))
            ->generate($filename);
    }
}