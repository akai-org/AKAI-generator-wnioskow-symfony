<?php

namespace App\Controller\Api\V1;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/v1/")
 */
class ListsController extends AbstractController
{
    /**
     * @Route("clubs", methods={"GET"})
     */
    public function clubs(): Response
    {
        $clubs = [
            'Akademickie Koło Aplikacji Internetowych',
            'Koło Naukowe "ARCHimpACT"',
            'Koło Naukowe "EDUART"',
            'Koło Naukowe "Light Architecture"',
            'Koło Naukowe BIMba - budownictwo i architektura',
            'Koło Naukowe Odkrywców Współczesnej Architektury "IN SITU"',
            'Koło Naukowe Studentów Architektury',
            'Koło Naukowe Historii Architektury i Urbanistyki',
            'Koło Naukowe "PUT Solar Dynamics"',
            'Koło Naukowe "SENSOR"',
            'Koło Naukowe Mikroprocesorowe Systemy Sterowania w Elektronice',
            'Koło Naukowe Robotyka Automatyka Informatyka',
            'Koło Naukowe "Cyber AiR"',
            'Koło Naukowe "Group of Horribly Optimistic Statisticians - GHOST"',
            'Koło Naukowe Bioinformatyki',
            'Koło Naukowe Grupa .NET',
            'Koło Naukowe Ruch Projektantów Gier "RPG"',
            'Koło Naukowe Systemów Wbudowanych',
            'Międzywydziałowe Studenckie Koło Naukowe "Linux Academic Group"',
            'Międzywydziałowe Studenckie Koło Naukowe "Sky is the limit"',
            'Koło Naukowe "Bezpieczeństwa i zarządzanie lotnictwem"',
            'Koło Naukowe "Studentów Budownictwa"',
            'Koło Naukowe "Zarządzania Kosztami w Budownictwie"',
            'Koło Naukowe Inżynierów Transportu Publicznego',
            'Koło Naukowe Silników Spalinowych',
            'Międzywydziałowe Studenckie Koło Naukowe "Sustainables"',
            'Koło Naukowe "ETIFIZ.EDU.FUN"',
            'Koło Naukowe Fizyki Obliczeniowej',
            'Koło Naukowe Fizyki Technicznej',
            'Koło Naukowe Biomechaniczne Towarzystwo Studentów "Da Vinci"',
            'Koło Naukowe Mechaników "MECHATRON"',
            'Koło Naukowe Obróbki Skrawaniem',
            'Koło Naukowe PRIME',
            'Międzywydziałowe Koło Naukowe "PETARDA"',
            'MKN PUT Motosport',
            'Akademicki Klub Lotniczy Politechniki Poznańskiej',
            'Akacemickie Koło Naukowe Stowarzyszenia Elektryków Polskich nr 7',
            'Koło Naukowe "Electronus"',
            'Koło Naukowe "PUT RocketLab"',
            'Koło Naukowe Inżynierii Środowiska',
            'Międzywydziałowe Studenckie Koło Naukowe "Polonium"',
            'Studenckie Koła Naukowe "Elektroenergetyka"',
            'Studenckie Koła Naukowe eMobility',
            'Centrum Promocji Inżynierów/ESTIEM',
            'Koło Naukowe "Logistyka"',
            'Koło Naukowe "Progress"',
            'Koło Naukowe Enactus',
            'Koło Naukowe Ergonomii',
            'Studenckie Koło Doskonalenia Procesów',
            'Koło Naukowe Technologii i Inżynierii Chemicznej',
            'Koło Naukowe "Bioinicjatywa"',
            'Koło Naukowe "Poli-MERitum"',
            'Koło Naukowe "PUT Chemistry"',
            'Koło Naukowe Nanoinżynierii Molekularnej',
            'Koło Naukowe "Illumination"',
            'Międzywydziałowe Koło Naukowe "Pracownia Architektury Zrównoważonej"',
            'Koło Naukowe "Gamma"',
            'Koło Naukowe Spektrum',
            'Koło Naukowe Krótkofalowców SP3PET',
            'Koło Naukowe Inżynierii Materiałowej "Alotropia"',
            'Koło Naukowe Budownictwa Drogowego',
            'Koło Naukowe Odlewników',
        ];
        sort($clubs);
        return $this->json([
            "clubs" => $clubs
        ]);
    }

    /**
     * @Route("departments", methods={"GET"})
     */
    public function departments(): Response
    {
        $departments = [
            'Informatyki i Telekomunikacji',
            'Inżynierii Materiałowej i Fizyki Technicznej',
            'Architektury',
            'Inżynierii Środowiska i Energetyki',
            'Inżynierii Mechanicznej',
            'Inżynierii Zarządzania',
            'Technologii Chemicznej',
            'Automatyki, Robotyki i Elektrotechniki',
            'Inżynierii Lądowej i Transportu',
        ];
        sort($departments);
        return $this->json([
            "departments" => $departments
        ]);
    }
}