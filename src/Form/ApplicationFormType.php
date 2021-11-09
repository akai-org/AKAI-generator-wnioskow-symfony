<?php

namespace App\Form;

use App\Entity\ApplicationForm;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ApplicationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('leader', TextType::class)
            ->add('clubname', TextType::class)
            ->add('department', TextType::class)
            ->add('patron', TextType::class)
            ->add('name_surname', TextType::class)
            ->add('album_number', TextType::class)
            ->add('function', TextType::class)
            ->add('start_date', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Submit']);
    }

    public function configureOption(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ApplicationForm::class
        ]);
    }
}