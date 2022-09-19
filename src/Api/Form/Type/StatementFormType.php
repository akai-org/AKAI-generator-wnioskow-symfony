<?php

namespace App\Api\Form\Type;

use App\Api\Form\Dto\StatementForm;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;

class StatementFormType extends AbstractType
{
    private const CLUB_LEADER_FIELD_NAME = 'club_leader_full_name';
    private const CLUB_NAME_FIELD_NAME = 'club_name';
    private const CLUB_DEPARTMENT_FIELD_NAME = 'club_department';
    private const CLUB_PATRON_FIELD_NAME = 'club_patron_full_name';
    private const STUDENT_NAME_FIELD_NAME = 'student_full_name';
    private const STUDENT_ALBUM_NUMBER_FIELD_NAME = 'student_album_number';
    private const STUDENT_FUNCTION_FIELD_NAME = 'student_function';
    private const SEMESTER_FIELD_NAME = 'semester';
    private const STUDENT_ACHIEVEMENTS_FIELD_NAME = 'student_achievements';
    private const NAME_PARAMETER = 'name';
    private const LABEL_PARAMETER = 'label';

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $constraints = [
            new NotBlank(null, sprintf('{{ %s }} cannot be empty', self::LABEL_PARAMETER)),
            new NotNull(null, sprintf('{{ %s }} must be given', self::LABEL_PARAMETER)),
        ];
        $invalidValueMessage = sprintf('%s is not valid', self::NAME_PARAMETER);
        $builder
            ->add(self::CLUB_LEADER_FIELD_NAME, TextType::class, [
                'constraints' => $constraints,
                'invalid_message' => $invalidValueMessage,
                'invalid_message_parameters' => [
                    self::NAME_PARAMETER => self::CLUB_LEADER_FIELD_NAME,
                ],
            ])
            ->add(self::CLUB_NAME_FIELD_NAME, TextType::class, [
                'constraints' => $constraints,
                'invalid_message' => $invalidValueMessage,
                'invalid_message_parameters' => [
                    self::NAME_PARAMETER => self::CLUB_NAME_FIELD_NAME,
                ],
            ])
            ->add(self::CLUB_DEPARTMENT_FIELD_NAME, TextType::class, [
                'constraints' => $constraints,
                'invalid_message' => $invalidValueMessage,
                'invalid_message_parameters' => [
                    self::NAME_PARAMETER => self::CLUB_DEPARTMENT_FIELD_NAME,
                ],
            ])
            ->add(self::CLUB_PATRON_FIELD_NAME, TextType::class, [
                'constraints' => $constraints,
                'invalid_message' => $invalidValueMessage,
                'invalid_message_parameters' => [
                    self::NAME_PARAMETER => self::CLUB_PATRON_FIELD_NAME,
                ],
            ])
            ->add(self::STUDENT_NAME_FIELD_NAME, TextType::class, [
                'constraints' => $constraints,
                'invalid_message' => $invalidValueMessage,
                'invalid_message_parameters' => [
                    self::NAME_PARAMETER => self::STUDENT_NAME_FIELD_NAME,
                ],
            ])
            ->add(self::STUDENT_ALBUM_NUMBER_FIELD_NAME, NumberType::class, [
                'constraints' => $constraints,
                'invalid_message' => $invalidValueMessage,
                'invalid_message_parameters' => [
                    self::NAME_PARAMETER => self::STUDENT_ALBUM_NUMBER_FIELD_NAME,
                ],
            ])
            ->add(self::STUDENT_FUNCTION_FIELD_NAME, TextType::class, [
                'constraints' => $constraints,
                'invalid_message' => $invalidValueMessage,
                'invalid_message_parameters' => [
                    self::NAME_PARAMETER => self::STUDENT_FUNCTION_FIELD_NAME,
                ],
            ])
            ->add(self::SEMESTER_FIELD_NAME, TextType::class, [
                'constraints' => $constraints,
                'invalid_message' => $invalidValueMessage,
                'invalid_message_parameters' => [
                    self::NAME_PARAMETER => self::SEMESTER_FIELD_NAME,
                ],
            ])
            ->add(self::STUDENT_ACHIEVEMENTS_FIELD_NAME, CollectionType::class, [
                'entry_type' => AchievementFormType::class,
                'allow_add' => true,
                'constraints' => $constraints,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => StatementForm::class,
            'allow_extra_fields' => true,
        ]);
    }
}