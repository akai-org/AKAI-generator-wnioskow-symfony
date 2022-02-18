<?php


namespace App\Entity;


use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints;
class ApplicationForm
{
    /** @var string */
    private $leader;
    /** @var string */
    private $clubname;
    /** @var string */
    private $department;
    /** @var string */
    private $patron;
    /** @var string */
    private $name_surname;
    /** @var int */
    private $album_number;
    /** @var string */
    private $function;
    /** @var string */
    private $semester;
    /** @var AchievementForm[] */
    private $achievements = [];

    private $copyFilled = ['leader', 'clubname', 'department', 'patron'];

    public function setFormsData(array $form_data) : void
    {
        foreach($form_data as $key => $value){
            $this->$key = $value;
        }
    }

    public function getPreFilledInputs() : array{
        return $this->copyFilled;
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraints('leader', [new NotBlank([
            'message' => 'Pole {{ label }} nie może być puste!'
        ]),
            new Length([
                'min' => 3,
                'max' => 50,
                'minMessage' => 'Imię i nazwisko przewodniczącego musi liczyć powyżej {{ limit }} znaków',
                'maxMessage' => 'Imię i nazwisko przewodniczącego nie może mieć powyżej {{ limit }} znaków',
            ]),

        ]);

        $metadata->addPropertyConstraints('clubname', [new NotBlank([
            'message' => 'Pole {{ label }} nie może być puste!'
        ]),
            new Length([
                'min' => 3,
                'max' => 70,
                'minMessage' => 'Nazwa koła musi liczyć powyżej {{ limit }} znaków',
                'maxMessage' => 'Nazwa koła nie może liczyć powyżej {{ limit }} znaków',
            ]),

        ]);

        $metadata->addPropertyConstraints('department', [new NotBlank([
            'message' => 'Pole {{ label }} nie może być puste!'
        ]),
            new Length([
                'min' => 5,
                'max' => 55,
                'minMessage' => 'Nazwa wydziału musi liczyć powyżej {{ limit }} znaków',
                'maxMessage' => 'Nazwa wydziału nie może liczyć powyżej {{ limit }} znaków',
            ]),

        ]);



        $metadata->addPropertyConstraints('patron', [new NotBlank([
            'message' => 'Pole {{ label }} nie może być puste!'
        ]),
            new Length([
                'min' => 4,
                'max' => 70,
                'minMessage' => 'Imię i nazwisko opiekuna koła musi liczyć powyżej {{ limit }} znaków',
                'maxMessage' => 'Imię i nazwisko opiekuna koła nie może być dłuższy niż {{ limit }} znaków',
            ]),

        ]);

        $metadata->addPropertyConstraints('name_surname', [new NotBlank([
            'message' => 'Pole {{ label }} nie może być puste!'
        ]),
            new Length([
                'min' => 4,
                'max' => 70,
                'minMessage' => 'Twoje imię i nazwisko musi liczyć powyżej {{ limit }} znaków',
                'maxMessage' => 'Twoje imię i nazwisko nie może być dłuższe niż {{ limit }} znaków',
            ]),

        ]);
        $metadata->addPropertyConstraints('album_number', [new NotBlank([
            'message' => 'Pole {{ label }} nie może być puste!'
        ]),
            new Length([
                'min' => 2,
                'max' => 15,
                'minMessage' => 'Numer albumu musi liczyć powyżej {{ limit }} znaków',
                'maxMessage' => 'Numer albumu musi liczyć poniżej {{ limit }} znaków',
            ]),

        ]);

        $metadata->addPropertyConstraints('function', [new NotBlank([
            'message' => 'Pole {{ label }} nie może być puste!'
        ]),
            new Length([
                'min' => 2,
                'max' => 30,
                'minMessage' => 'Funkcja w kole naukowym musi być dłuższa niż {{ limit }} znaków',
                'maxMessage' => 'Funkcja w kole naukowym musi być krótsza niż {{ limit }} znaków',
            ]),

        ]);

        $metadata->addPropertyConstraints('semester', [new NotBlank([
            'message' => 'Pole {{ label }} nie może być puste!'
        ]),
            new Length([
                'min' => 3,
                'max' => 30,
                'minMessage' => 'Semestr członkowstwa musi być dłuższy niż {{ limit }} znaków',
                'maxMessage' => 'Semestr członkowstwa musi być krótszy niż niż {{ limit }} znaków',
            ]),

        ]);


    }

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

    public function addAchievement(AchievementForm $achievement): void
    {
        array_push($this->achievements, $achievement);
    }
}