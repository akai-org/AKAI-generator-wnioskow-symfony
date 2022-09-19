<?php

namespace App\Api\Form\Dto;


use App\Entity\Document;
use App\Entity\Student;

class StatementForm
{
    private string $clubLeaderFullName;
    private string $clubName;
    private string $clubDepartment;
    private string $clubPatronFullName;
    private string $studentFullName;
    private string $studentAlbumNumber;
    private string $studentFunction;
    private string $semester;
    private array $studentAchievements;

    /**
     * @return string
     */
    public function getClubLeaderFullName(): string
    {
        return $this->clubLeaderFullName;
    }

    /**
     * @param string $clubLeaderFullName
     */
    public function setClubLeaderFullName(string $clubLeaderFullName): void
    {
        $this->clubLeaderFullName = $clubLeaderFullName;
    }

    /**
     * @return string
     */
    public function getClubName(): string
    {
        return $this->clubName;
    }

    /**
     * @param string $clubName
     */
    public function setClubName(string $clubName): void
    {
        $this->clubName = $clubName;
    }

    /**
     * @return string
     */
    public function getClubDepartment(): string
    {
        return $this->clubDepartment;
    }

    /**
     * @param string $clubDepartment
     */
    public function setClubDepartment(string $clubDepartment): void
    {
        $this->clubDepartment = $clubDepartment;
    }

    /**
     * @return string
     */
    public function getClubPatronFullName(): string
    {
        return $this->clubPatronFullName;
    }

    /**
     * @param string $clubPatronFullName
     */
    public function setClubPatronFullName(string $clubPatronFullName): void
    {
        $this->clubPatronFullName = $clubPatronFullName;
    }

    /**
     * @return string
     */
    public function getStudentFullName(): string
    {
        return $this->studentFullName;
    }

    /**
     * @param string $studentFullName
     */
    public function setStudentFullName(string $studentFullName): void
    {
        $this->studentFullName = $studentFullName;
    }

    /**
     * @return string
     */
    public function getStudentAlbumNumber(): string
    {
        return $this->studentAlbumNumber;
    }

    /**
     * @param string $studentAlbumNumber
     */
    public function setStudentAlbumNumber(string $studentAlbumNumber): void
    {
        $this->studentAlbumNumber = $studentAlbumNumber;
    }

    /**
     * @return string
     */
    public function getStudentFunction(): string
    {
        return $this->studentFunction;
    }

    /**
     * @param string $studentFunction
     */
    public function setStudentFunction(string $studentFunction): void
    {
        $this->studentFunction = $studentFunction;
    }

    /**
     * @return string
     */
    public function getSemester(): string
    {
        return $this->semester;
    }

    /**
     * @param string $semester
     */
    public function setSemester(string $semester): void
    {
        $this->semester = $semester;
    }

    /**
     * @return array
     */
    public function getStudentAchievements(): array
    {
        return $this->studentAchievements;
    }

    /**
     * @param AchievementForm[] $studentAchievements
     */
    public function setStudentAchievements(array $studentAchievements): void
    {
        $this->studentAchievements = $studentAchievements;
    }

    public function getDocument(): Document
    {
        $student = new Student(
            $this->studentFullName,
            $this->studentAlbumNumber,
            $this->studentFunction,
            $this->semester,
            $this->yea
        );
    }
}