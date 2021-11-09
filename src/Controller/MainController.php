<?php


namespace App\Controller;

use App\Entity\ApplicationForm;
use App\Form\ApplicationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class MainController extends AbstractController
{
    /**
     * @Route("", methods={"GET"})
     */
    public function index(): Response
    {
        $form = $this->createForm(ApplicationFormType::class, new ApplicationForm());
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