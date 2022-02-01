<?php

namespace App\Entity;

class Document
{
    /** @var Group */
    private $group;

    /** @var Student */
    private $student;

    public function __construct(
        Group $group,
        Student $student
    )
    {
        $this->group = $group;
        $this->student = $student;
    }

    public function group(): Group
    {
        return $this->group;
    }

    public function student(): Student
    {
        return $this->student;
    }
}
