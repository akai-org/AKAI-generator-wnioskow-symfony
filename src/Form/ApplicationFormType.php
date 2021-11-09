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
            ->add('leader', TextType::class, ['label' => 'Przewodniczący:'])
            ->add('clubname', TextType::class, ['label' => 'Nazwa Koła (w dopełniaczu):'])
            ->add('department', TextType::class, ['label' => 'Nazwa Wydziału:'])
            ->add('patron', TextType::class, ['label' => 'Opiekun Koła:'])
            ->add('name_surname', TextType::class, ['label' => 'Imię i Nazwisko:'])
            ->add('album_number', TextType::class, ['label' => 'Indeks:'])
            ->add('function', TextType::class, ['label' => 'Funkcja:'])
            ->add('start_date', TextType::class, ['label' => 'Semestr członkostwa:'])
            ->add('save', SubmitType::class, ['label' => 'Wygeneruj']);
    }

    public function configureOption(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ApplicationForm::class
        ]);
    }
}