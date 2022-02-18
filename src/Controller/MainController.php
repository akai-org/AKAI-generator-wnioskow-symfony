<?php


namespace App\Controller;

use App\Entity\ApplicationForm;
use App\Form\ApplicationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @Route("/")
 */
class MainController extends AbstractController
{
    /**
     * @Route("", methods={"GET"})
     */
    public function index(Request $request): Response
    {
        //declare obj
        $applicationForm = new ApplicationForm();

        $preFilledInputs = $applicationForm->getPreFilledInputs();
        $arr = [];
        foreach($preFilledInputs as $input){
            $$input = $request->get($input);
            if($$input == null){
                $$input = '';
            }else{
                $arr[$input] = $$input;
            }
        }
        $applicationForm->setFormsData($arr);

        $form = $this->createForm(ApplicationFormType::class, $applicationForm);
        return $this->renderForm('base.html.twig', [
            'form' => $form,
            'errors' => null
        ]);
    }

    /**
     * @Route("", methods={"POST"})
     */
    public function postForm(Request $request, ValidatorInterface $validator): Response
    {
        /*$form = $this->createForm(ApplicationFormType::class, new ApplicationForm());
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            error_log(var_export($form->getData(), true));
        }
        return $this->redirect("/");*/
        //get data
        $form_data = $request->request->get('application_form');
        //create object
        $application = new ApplicationForm();
        $form_data = (array) $form_data;
        //set all form data
        $application->setFormsData($form_data);
        //validate
        $errors = $validator->validate($application);
        if (count($errors) > 0) {

            $errorsString = (string) $errors;
            $form = $this->createForm(ApplicationFormType::class, $application);
            return $this->renderForm('base.html.twig', [
                'errors' => $errors,
                'form' => $form
            ]);
        }

        return new Response('The author is valid! Yes!');







    }
}