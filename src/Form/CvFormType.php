<?php

namespace App\Form;

use App\Entity\Cv;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CvFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class,[
                'label' => 'Titre',
                'attr' => [
                    'class' => 'FormControl',
                    'placeholder' => 'titre..'
                ],
                'label_attr' => [
                    'class' => 'FormLabel'
                ]
            ])
            ->add('company', TextType::class, [
                'label' => 'Entreprise',
                'attr' => [
                    'class' => 'FormControl',
                    'placeholder' => 'entreprise..'
                ],
                'label_attr' => [
                    'class' => 'FormLabel'
                ]
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'attr' => [
                    'class' => 'FormControl Textarea',
                    'placeholder' => 'description..',
                ],
                'label_attr' => [
                    'class' => 'FormLabel FormLabelTextarea'
                ]
             ])
            ->add('start_date', TextType::class, [
                'label' => 'Date de début',
                'attr' => [
                    'class' => 'FormControl',
                    'placeholder' => 'début..'
                ],
                'label_attr' => [
                    'class' => 'FormLabel'
                ]
            ])
            ->add('end_date', TextType::class, [
                'label' => 'Date de fin',
                'attr' => [
                    'class' => 'FormControl',
                    'placeholder' => 'fin..'
                ],
                'label_attr' => [
                    'class' => 'FormLabel'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Ajouter cette expérience',
                'attr' => [
                    'class' => 'GoAddCV'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Cv::class,
        ]);
    }
}
