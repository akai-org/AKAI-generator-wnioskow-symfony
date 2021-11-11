<?php


namespace App\Entity;


class ApplicationForm
{
    protected $leader;
    protected $clubname;
    protected $department;
    protected $patron;

    protected $name_surname;
    protected $album_number;
    protected $function;
    protected $semester;

    public function getLeader()
    {
        return $this->leader;
    }

    public function setLeader($leader): void
    {
        $this->leader = $leader;
    }

    public function getClubname()
    {
        return $this->clubname;
    }

    public function setClubname($clubname): void
    {
        $this->clubname = $clubname;
    }

    public function getDepartment()
    {
        return $this->department;
    }

    public function setDepartment($department): void
    {
        $this->department = $department;
    }

    public function getPatron()
    {
        return $this->patron;
    }

    public function setPatron($patron): void
    {
        $this->patron = $patron;
    }

    public function getNameSurname()
    {
        return $this->name_surname;
    }

    public function setNameSurname($name_surname): void
    {
        $this->name_surname = $name_surname;
    }

    public function getAlbumNumber()
    {
        return $this->album_number;
    }

    public function setAlbumNumber($album_number): void
    {
        $this->album_number = $album_number;
    }

    public function getFunction()
    {
        return $this->function;
    }

    public function setFunction($function): void
    {
        $this->function = $function;
    }

    public function getSemester()
    {
        return $this->semester;
    }

    public function setSemester($semester): void
    {
        $this->semester = $semester;
    }
}