<?php

namespace App\Form;

use App\Entity\Achievement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AchievementFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('startDate', TextType::class)
            ->add('endDate', TextType::class);
    }

    public function configureOption(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Achievement::class
        ]);
    }
}