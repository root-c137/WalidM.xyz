<?php

namespace App\Form;

use App\Entity\Presentation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PresentationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Texte', TextareaType::class, [
                'label' => 'Présentation',
                'attr' => [
                    'placeholder' => 'présentation..',
                    'class' => 'FormControl Textarea'
                ],
                'label_attr' => [
                    'class' => 'FormLabel FormLabelTextarea'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'modifier la présentation',
                'attr' => [
                    'class' => 'Update'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Presentation::class,
        ]);
    }
}
