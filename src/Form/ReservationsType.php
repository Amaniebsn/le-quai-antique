<?php

namespace App\Form;

use App\Entity\Reservations;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\DateIntervalType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class , [
                'label' => 'Votre prénom',
                'attr' => [
                    'placeholder' => 'Entrer votre prénom'
                ]
                ])
            ->add('lastname', TextType::class , [
                'label' => 'Votre prénom',
                'attr' => [
                    'placeholder' => 'Entrer votre prénom'
                ]
            ])
            ->add('couverts', TextType::class , [
                'label' => 'Nombre de couverts',
                'attr' => [
                    'placeholder' => 'Nombre de personne'
                ]
            ])
            ->add('dates', DateType::class, [] )
            ->add('horaire', ChoiceType::class, [
                'choices'  => [
                    '12h' => 12,
                    '14h' => 14,
                    '15h' => 15,
                    '16h' => 16,

                ],
            ])
            ->add('allergies')
            ->add('submit', SubmitType::class, [
                    'label' => 'Rerservation'
                    ] )

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservations::class,
        ]);
    }
    

}  