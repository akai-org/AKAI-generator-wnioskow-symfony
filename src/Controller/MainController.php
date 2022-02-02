<?php


namespace App\Controller;

use App\Entity\Achievement;
use App\Entity\ApplicationForm;
use App\Entity\Club;
use App\Entity\Document;
use App\Entity\Student;
use App\Form\ApplicationFormType;
use App\Services\DocumentGeneratingService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class MainController extends AbstractController
{
    /** @var DocumentGeneratingService */
    private $service;

    public function __construct(DocumentGeneratingService $service)
    {
        $this->service = $service;
    }

    /**
     * @Route("", methods={"GET"})
     */
    public function index(): Response
    {
        $achievements = [
            new Achievement("ZRobilem picke",
                \DateTimeImmutable::createFromFormat('Y-m-d', '2021-04-12'),
                \DateTimeImmutable::createFromFormat('Y-m-d', '2021-05-12')
            ),
            new Achievement("ZRobilem apke",
                \DateTimeImmutable::createFromFormat('Y-m-d', '2021-02-22'),
                \DateTimeImmutable::createFromFormat('Y-m-d', '2021-07-12')
            ),
            new Achievement("ZRobilem salto",
                \DateTimeImmutable::createFromFormat('Y-m-d', '2021-08-31'),
                \DateTimeImmutable::createFromFormat('Y-m-d', '2021-10-15')
            ),
        ];
        $student = new Student(
            "example name",
                "777",
                "tester",
                "letni",
                "2018/2022",
            $achievements
        );
        $club = new Club(
            "filip szustak",
            "kolo pieczenia picki",
            "wydzial picki",
            "mikolaj morze"
        );
        $document = new Document($club, $student);
        $this->service->getFromDocument($document);
        $applicationForm = new ApplicationForm();
        $form = $this->createForm(ApplicationFormType::class, $applicationForm);
        return $this->renderForm('base.html.twig', [
            'form' => $form
        ]);
    }

    /**
     * @Route("", methods={"POST"})
     */
    public function postForm(Request $request): Response
    {
        $form = $this->createForm(ApplicationFormType::class, new ApplicationForm());
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            error_log(var_export($form->getData(), true));
        }
        return $this->redirect("/");
    }
}