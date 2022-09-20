<?php

namespace App\Api\Form\Dto;

use App\Entity\Achievement;
use DateTimeImmutable;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

class AchievementForm
{
    #[SerializedName('description')]
    #[Assert\NotBlank(null, "description cannot be left blank")]
    public ?string $description;

    #[SerializedName('start_date')]
    #[Assert\NotBlank(null, "start_date cannot be left blank")]
    #[Assert\Date(null, "start_date must be of format YYYY-MM-DD")]
    public ?string $startDate;

    #[SerializedName('end_date')]
    #[Assert\NotBlank(null, "end_date cannot be left blank")]
    #[Assert\Date(null, "end_date must be of format YYYY-MM-DD")]
    public ?string $endDate;

    public function getAchievement(): Achievement
    {
        return new Achievement(
            $this->description,
            DateTimeImmutable::createFromFormat('Y-m-d', $this->startDate),
            DateTimeImmutable::createFromFormat('Y-m-d', $this->endDate)
        );
    }
}