<?php

namespace App\Api\Form\Dto;

use DateTimeImmutable;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

class AchievementForm
{
    #[SerializedName('description')]
    #[Assert\NotBlank(null, "club_leader_full_name cannot be left blank")]
    public ?string $description;

    #[SerializedName('start_date')]
    #[Assert\NotBlank(null, "club_leader_full_name cannot be left blank")]
    public ?DateTimeImmutable $startDate;

    #[SerializedName('end_date')]
    #[Assert\NotBlank(null, "club_leader_full_name cannot be left blank")]
    public ?DateTimeImmutable $endDate;
}