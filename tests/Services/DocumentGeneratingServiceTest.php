<?php

namespace App\Tests\Services;

use App\Entity\Achievement;
use App\Entity\Club;
use App\Entity\Document;
use App\Entity\Student;
use App\Services\DocumentGeneratingService;
use App\Tools\PdfGenerator\PdfGenerator;
use App\Tools\PdfGenerator\StyledElementsFactory;
use PHPUnit\Framework\MockObject\Stub\ReturnSelf;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\Promise\ReturnPromise;
use Prophecy\Prophecy\MethodProphecy;

class DocumentGeneratingServiceTest extends TestCase
{
    private const STUDENT_NAME = "dawid dziedzic";
    private const STUDENT_ROLE = "murarz tynkarz akrobata";
    private const STUDENT_INDEX = "666a";
    private const STUDENT_SEMESTER = "666a";
    private const STUDENT_ACADEMIC_YEAR = "2018/2022";

    private const CLUB_LEADER = "Jasnie nam panujacy Filip";
    private const CLUB_NAME = "Akademickie kolo darmowej picki";
    private const DEPT_NAME = "Wydzial piekarniczy";
    private const PATRON_NAME = "sw hubert";

    private const DATE_FORMAT = 'Y-m-d';

    /** @var DocumentGeneratingService */
    private $service;

    /** @var Document */
    private $document;

    protected function setUp(): void
    {
        parent::setUp();
        $achievements = [new Achievement(
            "Podwójne salto w tył",
            \DateTimeImmutable::createFromFormat(self::DATE_FORMAT, "2021-12-12"),
            \DateTimeImmutable::createFromFormat(self::DATE_FORMAT, "2022-02-22")
        )];
        $student = new Student(
            self::STUDENT_NAME,
            self::STUDENT_INDEX,
            self::STUDENT_ROLE,
            self::STUDENT_SEMESTER,
            self::STUDENT_ACADEMIC_YEAR,
            $achievements
        );
        $club = new Club(
            self::CLUB_LEADER,
            self::CLUB_NAME,
            self::DEPT_NAME,
            self::PATRON_NAME
        );
        $this->document = new Document($club, $student);
    }

    /**
     * @test
     */
    public function it_calls_to_generator()
    {
        $expectedResult = "ok";
        $generator = $this->createMock(PdfGenerator::class);
        $generator->method("setVariable")->willReturnSelf();
        $generator->method("setListVariable")->willReturnSelf();
        $generator->method("generate")->willReturn($expectedResult);
        $factory = $this->createMock(StyledElementsFactory::class);
        $this->service = new DocumentGeneratingService($generator, $factory);

        $result = $this->service->getFromDocument($this->document);

        $this->assertEquals($expectedResult, $result);
    }
}