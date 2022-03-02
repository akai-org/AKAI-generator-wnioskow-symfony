<?php


namespace App\Controller;

use App\Entity\ApplicationForm;
use App\Entity\Club;
use App\Entity\Document;
use App\Form\ApplicationFormType;
use App\Services\DocumentGeneratingService;
use App\Tools\PdfGenerator\Latex\LatexPdfGenerator;
use App\Tools\PdfGenerator\Latex\LatexStyledElementsFactory;
use SebastianBergmann\Invoker\TimeoutException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @Route("/")
 */
class MainController extends AbstractController
{

    public function __construct(DocumentGeneratingService $service){
        $this->service = $service;
    }

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
    public function postForm(Request $request, ValidatorInterface $validator)
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
        #print_r($form_data);
        $errors = $validator->validate($application);
        if (count($errors) > 0) {

            $errorsString = (string) $errors;
            $form = $this->createForm(ApplicationFormType::class, $application);
            return $this->renderForm('base.html.twig', [
                'errors' => $errors,
                'form' => $form
            ]);
        }

        $application->separateData();


        $clubObj = $application->getClubObject();
        $studentObj = $application->getStudentObject();
        $doc = new Document($clubObj, $studentObj);
        $generatedFile = $this->service->getFromDocument($doc);

        $response = new Response($generatedFile);


        $disposition = $response->headers->makeDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            "zaswidaczenie.pdf"
        );

        $response->headers->set('Content-Disposition', $disposition);
        return $response;
        # return new Response('The author is valid! Yes!');

    }
}