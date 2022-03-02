<?php

namespace App\Form;

use App\Entity\ApplicationForm;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ApplicationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('leader', TextType::class)
            ->add('clubname', ChoiceType::class, [
                'choices' => [
                    'Akademickie Koło Aplikacji Internetowych' => 'Akademickie Koło Aplikacji Internetowych',
                    'Koło Naukowe "ARCHimpACT"' => 'Koło Naukowe "ARCHimpACT"',
                    'Koło Naukowe "EDUART"' => 'Koło Naukowe "EDUART"',
                    'Koło Naukowe "Light Architecture"' => 'Koło Naukowe "Light Architecture"',
                    'Koło Naukowe BIMba - budownictwo i architektura' => 'Koło Naukowe BIMba - budownictwo i architektura',
                    'Koło Naukowe Odkrywców Współczesnej Architektury "IN SITU"' => 'Koło Naukowe Odkrywców Współczesnej Architektury "IN SITU"',
                    'Koło Naukowe Studentów Architektury' => 'Koło Naukowe Studentów Architektury',
                    'Koło Naukowe Historii Architektury i Urbanistyki' => 'Koło Naukowe Historii Architektury i Urbanistyki',
                    'Koło Naukowe "PUT Solar Dynamics"' => 'Koło Naukowe "PUT Solar Dynamics"',
                    'Koło Naukowe "SENSOR"' => 'Koło Naukowe "SENSOR"',
                    'Koło Naukowe Mikroprocesorowe Systemy Sterowania w Elektronice' => 'Koło Naukowe Mikroprocesorowe Systemy Sterowania w Elektronice',
                    'Koło Naukowe Robotyka Automatyka Informatyka' => 'Koło Naukowe Robotyka Automatyka Informatyka',
                    'Koło Naukowe "Cyber AiR"' => 'Koło Naukowe "Cyber AiR',
                    'Koło Naukowe "Group of Horribly Optimistic Statisticians - GHOST"' => 'Koło Naukowe "Group of Horribly Optimistic Statisticians - GHOST"',
                    'Koło Naukowe Bioinformatyki' => 'Koło Naukowe Bioinformatyki',
                    'Koło Naukowe Grupa .NET' => 'Koło Naukowe Grupa .NET',
                    'Koło Naukowe Ruch Projektantów Gier "RPG"' => 'Koło Naukowe Ruch Projektantów Gier "RPG"',
                    'Koło Naukowe Systemów Wbudowanych' => 'Koło Naukowe Systemów Wbudowanych',
                    'Międzywydziałowe Studenckie Koło Naukowe "Linux Academic Group"' => 'Międzywydziałowe Studenckie Koło Naukowe "Linux Academic Group"',
                    'Międzywydziałowe Studenckie Koło Naukowe "Sky is the limit"' => 'Międzywydziałowe Studenckie Koło Naukowe "Sky is the limit"',
                    'Koło Naukowe "Bezpieczeństwa i zarządzanie lotnictwem"' => 'Koło Naukowe "Bezpieczeństwa i zarządzanie lotnictwem"',
                    'Koło Naukowe "Studentów Budownictwa"' => 'Koło Naukowe "Studentów Budownictwa"',
                    'Koło Naukowe "Zarządzania Kosztami w Budownictwie"' => 'Koło Naukowe "Zarządzania Kosztami w Budownictwie"',
                    'Koło Naukowe Inżynierów Transportu Publicznego' => 'Koło Naukowe Inżynierów Transportu Publicznego',
                    'Koło Naukowe Silników Spalinowych' => 'Koło Naukowe Silników Spalinowych',
                    'Międzywydziałowe Studenckie Koło Naukowe "Sustainables"' => 'Międzywydziałowe Studenckie Koło Naukowe "Sustainables"',
                    'Koło Naukowe "ETIFIZ.EDU.FUN"' => 'Koło Naukowe "ETIFIZ.EDU.FUN"',
                    'Koło Naukowe Fizyki Obliczeniowej' => 'Koło Naukowe Fizyki Obliczeniowej',
                    'Koło Naukowe Fizyki Technicznej' => 'Koło Naukowe Fizyki Technicznej',
                    'Koło Naukowe Biomechaniczne Towarzystwo Studentów "Da Vinci"' => 'Koło Naukowe Biomechaniczne Towarzystwo Studentów "Da Vinci"',
                    'Koło Naukowe Mechaników "MECHATRON"' => 'Koło Naukowe Mechaników "MECHATRON"',
                    'Koło Naukowe Obróbki Skrawaniem' => 'Koło Naukowe Obróbki Skrawaniem',
                    'Koło Naukowe PRIME' => 'Koło Naukowe PRIME',
                    'Międzywydziałowe Koło Naukowe "PETARDA"' => 'Międzywydziałowe Koło Naukowe "PETARDA"',
                    'MKN PUT Motosport' => 'MKN PUT Motosport',
                    'Akademicki Klub Lotniczy Politechniki Poznańskiej' => 'Akademicki Klub Lotniczy Politechniki Poznańskiej',
                    'Akacemickie Koło Naukowe Stowarzyszenia Elektryków Polskich nr 7' => 'Akacemickie Koło Naukowe Stowarzyszenia Elektryków Polskich nr 7',
                    'Koło Naukowe "Electronus"' => 'Koło Naukowe "Electronus"',
                    'Koło Naukowe "PUT RocketLab"' => 'Koło Naukowe "PUT RocketLab"',
                    'Koło Naukowe Inżynierii Środowiska' => 'Koło Naukowe Inżynierii Środowiska',
                    'Międzywydziałowe Studenckie Koło Naukowe "Polonium"' => 'Międzywydziałowe Studenckie Koło Naukowe "Polonium"',
                    'Studenckie Koła Naukowe "Elektroenergetyka"' => 'Studenckie Koła Naukowe "Elektroenergetyka"',
                    'Studenckie Koła Naukowe eMobility' => 'Studenckie Koła Naukowe eMobility',
                    'Centrum Promocji Inżynierów/ESTIEM' => 'Centrum Promocji Inżynierów/ESTIEM',
                    'Koło Naukowe "Logistyka"' => 'Koło Naukowe "Logistyka"',
                    'Koło Naukowe "Progress"' => 'Koło Naukowe "Progress"',
                    'Koło Naukowe Enactus' => 'Koło Naukowe Enactus',
                    'Koło Naukowe Ergonomii' => 'Koło Naukowe Ergonomii',
                    'Studenckie Koło Doskonalenia Procesów' => 'Studenckie Koło Doskonalenia Procesów',
                    'Koło Naukowe Technologii i Inżynierii Chemicznej' => 'Koło Naukowe Technologii i Inżynierii Chemicznej',
                    'Koło Naukowe "Bioinicjatywa"' => 'Koło Naukowe "Bioinicjatywa"',
                    'Koło Naukowe "Poli-MERitum"' => 'Koło Naukowe "Poli-MERitum"',
                    'Koło Naukowe "PUT Chemistry"' => 'Koło Naukowe "PUT Chemistry"',
                    'Koło Naukowe Nanoinżynierii Molekularnej' => 'Koło Naukowe Nanoinżynierii Molekularnej',
                    'Koło Naukowe "Illumination"' => 'Koło Naukowe "Illumination"',
                    'Międzywydziałowe Koło Naukowe "Pracownia Architektury Zrównoważonej"' => 'Międzywydziałowe Koło Naukowe "Pracownia Architektury Zrównoważonej"',
                    'Koło Naukowe "Gamma"' => 'Koło Naukowe "Gamma"',
                    'Koło Naukowe Spektrum' => 'Koło Naukowe Spektrum',
                    'Koło Naukowe Krótkofalowców SP3PET' => 'Koło Naukowe Krótkofalowców SP3PET',
                    'Koło Naukowe Inżynierii Materiałowej "Alotropia"' => 'Koło Naukowe Inżynierii Materiałowej "Alotropia"',
                    'Koło Naukowe Budownictwa Drogowego' => 'Koło Naukowe Budownictwa Drogowego',
                    'Koło Naukowe Odlewników' => 'Koło Naukowe Odlewników'
                ]
            ])
            ->add('department', ChoiceType::class, [
                'choices' => [
                    'Informatyki i Telekomunikacji' => 'Informatyki i Telekomunikacji',
                    'Inżynierii Materiałowej i Fizyki Technicznej' => 'Inżynierii Materiałowej i Fizyki Technicznej',
                    'Architektury' => 'Architektury',
                    'Inżynierii Środowiska i Energetyki' => 'Inżynierii Środowiska i Energetyki',
                    'Inżynierii Mechanicznej' => 'Inżynierii Mechanicznej',
                    'Inżynierii Zarządzania' => 'Inżynierii Zarządzania',
                    'Technologii Chemicznej' => 'Technologii Chemicznej',
                    'Automatyki, Robotyki i Elektrotechniki' => 'Automatyki, Robotyki i Elektrotechniki',
                    'Inżynierii Lądowej i Transportu' => 'Inżynierii Lądowej i Transportu'
                ]
            ])
            ->add('patron', TextType::class)
            ->add('name_surname', TextType::class)
            ->add('album_number', TextType::class)
            ->add('function', TextType::class)
            ->add('semester', ChoiceType::class, [
                'choices'  => [
                    'zimowy' => "zimowym",
                    'letni' => "letnim"
                ],
            ])
            ->add('year', ChoiceType::class, [
                'choices' => [
                    '2021/2022' => '2021/2022',
                    '2022/2023' => '2022/2023',
                    '2023/2024' => '2023/2024',
                    '2024/2025' => '2024/2025'


                ]
            ])
            ->add('achievements', CollectionType::class, [
                'entry_type' => AchievementFormType::class,
                'allow_add' => true
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ApplicationForm::class
        ]);
    }
}