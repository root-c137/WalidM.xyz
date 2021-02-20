<?php

namespace App\Form;

use App\Entity\Projet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjetFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Title', TextType::class,[
                'label' => 'Titre',
                'required' => true,
                'attr' => [
                    'class' => 'FormControl',
                    'placeholder' => 'titre..'
                ],
                'label_attr' => [
                    'class' => 'FormLabel'
                ]
            ])
            ->add('Description', TextareaType::class, [
                'label' => 'Description',
                'required' => true,
                'attr' => [
                    'class' => 'FormControl Textarea',
                    'placeholder' => 'description...'
                ],
                'label_attr' => [
                    'class' => 'FormLabel  FormLabelTextarea'
                ]
            ])
            ->add('Image', FileType::class, [
                'label' => 'Image',
                'required' => true,
                'attr' => [
                    'class' => 'FormControl',
                    'placeholder' => 'image..'
                ],
                'label_attr' => [
                    'class' => 'FormLabel'
                ]
            ])
            ->add('Category', TextType::class, [
                'label' => 'Category',
                'required' => true,
                'attr' => [
                    'class' => 'FormControl',
                    'placeholder' => 'categorie...'
                ],
                'label_attr' => [
                    'class' => 'FormLabel'
                ]
            ])
            ->add('Github', TextType::class, [
                'label' => 'Github',
                'attr' => [
                    'class' => 'FormControl',
                    'placeholder' => 'github..'
                ],
                'label_attr' => [
                    'class' => 'FormLabel'
                ]
            ])
            ->add('Link', TextType::class, [
                'label' => 'Link',
                'required' => true,
                'attr' => [
                    'class' => 'FormControl',
                    'placeholder' => 'link..'
                ],
                'label_attr' => [
                    'class' => 'FormLabel'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Ajouter',
                'attr' => [
                    'class' => 'GoAddButton'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Projet::class,
        ]);
    }
}
