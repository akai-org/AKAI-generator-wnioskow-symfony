<?php

namespace App\Api\Form\Dto;

use App\Entity\Club;
use App\Entity\Document;
use App\Entity\Student;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

class StatementForm
{
    private const CURRENT_YEAR_AVAILABLE = "2021/22";

    #[SerializedName('club_leader_full_name')]
    #[Assert\NotBlank(null, "club_leader_full_name cannot be left blank")]
    public ?string $leaderName;

    #[SerializedName('club_name')]
    #[Assert\NotBlank(null, "club_name cannot be left blank")]
    public ?string $clubName;

    #[SerializedName('club_department')]
    #[Assert\NotBlank(null, "club_department cannot be left blank")]
    public ?string $department;

    #[SerializedName('club_patron_full_name')]
    #[Assert\NotBlank(null, "club_patron_full_name cannot be left blank")]
    public ?string $patronName;

    #[SerializedName('student_full_name')]
    #[Assert\NotBlank(null, "student_full_name cannot be left blank")]
    public ?string $studentName;

    #[SerializedName('student_album_number')]
    #[Assert\NotBlank(null, "student_album_number cannot be left blank")]
    public ?string $index;

    #[SerializedName('student_function')]
    #[Assert\NotBlank(null, "student_function cannot be left blank")]
    public ?string $position;

    #[SerializedName('semester')]
    #[Assert\NotBlank(null, "semester cannot be left blank")]
    public ?string $semester;

    #[SerializedName('student_achievements')]
    #[Assert\NotBlank(null, "student_achievements cannot be left blank")]
    #[Assert\Valid]
    /** @var AchievementForm[] */
    public ?array $achievements;

    public function getDocument(): Document
    {
        return new Document($this->getClub(), $this->getStudent());
    }

    private function getClub(): Club
    {
        return new Club(
            $this->leaderName,
            $this->clubName,
            $this->department,
            $this->patronName
        );
    }

    private function getStudent(): Student
    {
        $achievements = [];
        foreach ($this->achievements as $achievement) {
            /** @var AchievementForm $achievement */
            $achievements[] = $achievement->getAchievement();
        }

        return new Student(
            $this->studentName,
            $this->index,
            $this->position,
            $this->semester,
            self::CURRENT_YEAR_AVAILABLE,
            $achievements,
        );
    }
}