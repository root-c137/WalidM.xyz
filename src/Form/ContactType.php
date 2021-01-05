<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'class' => 'FormControl',
                    'placeholder' => 'Nom..'
                ],
                'label_attr' => [
                    'class' => 'FormLabel'
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Prénom',
                'attr' => [
                    'class' => 'FormControl',
                    'placeholder' => 'Prénom..'
                    ],
                'label_attr' => [
                    'class' => 'FormLabel'
                ]
            ])

            ->add('mail', TextType::class, [
                'label' => 'Adresse mail',
                'attr' => [
                    'class' => 'FormControl',
                    'placeholder' => 'Adresse mail..'
                ],
                'label_attr' => [
                    'class' => 'FormLabel'
                ]
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Message...',
                'attr' => [
                    'class' => 'FormControl Textarea',
                    'placeholder' => 'Votre message...'
                ],
                'label_attr' => [
                    'class' => 'FormLabel FormLabelTextarea'
                ]
            ])
            ->add('submit', SubmitType::class,[
                'label' => 'Envoyer',
                'attr' => [
                    'class' => 'GoMessage',
                    ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
