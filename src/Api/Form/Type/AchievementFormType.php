<?php

namespace App\Api\Form\Type;

use App\Api\Form\Dto\AchievementForm;
use DateTimeImmutable;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;

class AchievementFormType extends AbstractType
{
    private const DESCRIPTION_FIELD_NAME = 'description';
    private const START_DATE_FIELD_NAME = 'start_date';
    private const END_DATE_FIELD_NAME = 'end_date';
    private const NAME_PARAMETER = 'name';
    private const LABEL_PARAMETER = 'label';

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $constraints = [
            new NotBlank(null, sprintf('{{ %s }} cannot be blank', self::LABEL_PARAMETER)),
            new NotNull(null, sprintf('{{ %s }} must be given', self::LABEL_PARAMETER)),
        ];
        $invalidDateMessage = sprintf('%s is not a valid date. Format should be YYYY-MM-DD.', self::NAME_PARAMETER);
        $builder
            ->add(self::DESCRIPTION_FIELD_NAME, TextareaType::class, [
                'constraints' => $constraints,
                'invalid_message' => sprintf('{{ %s }} is not valid', self::NAME_PARAMETER),
                'invalid_message_parameters' => [
                    self::NAME_PARAMETER => self::DESCRIPTION_FIELD_NAME,
                ],
            ])
            ->add(self::START_DATE_FIELD_NAME, DateType::class, [
                'constraints' => $constraints,
                'invalid_message' => $invalidDateMessage,
                'invalid_message_parameters' => [
                    self::NAME_PARAMETER => self::START_DATE_FIELD_NAME,
                ],
                'widget' => 'single_text',
                'by_reference' => true,
            ])
            ->add(self::END_DATE_FIELD_NAME, DateType::class, [
                'constraints' => $constraints,
                'invalid_message' => $invalidDateMessage,
                'invalid_message_parameters' => [
                    self::NAME_PARAMETER => self::END_DATE_FIELD_NAME,
                ],
                'widget' => 'single_text',
                'by_reference' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AchievementForm::class,
            'allow_extra_fields' => true,
        ]);
    }
}