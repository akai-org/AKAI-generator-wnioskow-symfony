<?php


namespace App\Entity;


class ApplicationForm
{
    private $leader;
    private $clubname;
    private $department;
    private $patron;

    private $name_surname;
    private $album_number;
    private $function;
    private $semester;
    private $achievements = [];

    public function getLeader(): string
    {
        return $this->leader;
    }

    public function setLeader(string $leader): void
    {
        $this->leader = $leader;
    }

    public function getClubname(): string
    {
        return $this->clubname;
    }

    public function setClubname(string $clubname): void
    {
        $this->clubname = $clubname;
    }

    public function getDepartment(): string
    {
        return $this->department;
    }

    public function setDepartment(string $department): void
    {
        $this->department = $department;
    }

    public function getPatron(): string
    {
        return $this->patron;
    }

    public function setPatron(string $patron): void
    {
        $this->patron = $patron;
    }

    public function getNameSurname(): string
    {
        return $this->name_surname;
    }

    public function setNameSurname(string $name_surname): void
    {
        $this->name_surname = $name_surname;
    }

    public function getAlbumNumber(): int
    {
        return $this->album_number;
    }

    public function setAlbumNumber(int $album_number): void
    {
        $this->album_number = $album_number;
    }

    public function getFunction(): string
    {
        return $this->function;
    }

    public function setFunction(string $function): void
    {
        $this->function = $function;
    }

    public function getSemester(): string
    {
        return $this->semester;
    }

    public function setSemester(string $semester): void
    {
        $this->semester = $semester;
    }

    public function getAchievements(): array
    {
        return $this->achievements;
    }

    public function setAchievements(array $achievements): void
    {
        $this->achievements = $achievements;
    }

    public function addAchievement(Achievement $achievement): void
    {
        array_push($this->achievements, $achievement);
    }
}