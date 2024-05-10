<?php

namespace App\Form;

use App\Entity\Annonces;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
class CreateAnnoncesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('title', TextType::class, [
            'label' => 'Titre',
            'attr' => [
                'placeholder' => 'Marque, model, année'
            ]
        ])
        ->add('brand', ChoiceType::class, [
            'label' => 'Marque',
            'choices' => [
                'Audi' => 'Audi',
                'BMW' => 'BMW',
                'Ferrari' => 'Ferrari',
                'Fiat' => 'Fiat',
                'Ford' => 'Ford',
                'Honda' => 'Honda',
                'Hyundai' => 'Hyundai',
                'Jaguar' => 'Jaguar',
                'Kia' => 'Kia',
                'Land Rover' => 'Land Rover',
                'Mazda' => 'Mazda',
                'Mercedes-Benz' => 'Mercedes-Benz',
                'Nissan' => 'Nissan',
                'Opel'=>'Opel',
                'Peugeot' => 'Peugeot',
                'Porsche' => 'Porsche',
                'Renault' => 'Renault',
                'Tesla' => 'Tesla',
                'Toyota' => 'Toyota',
                'Volkswagen' => 'Volkswagen',
                'Volvo' => 'Volvo',
            ],  
            'row_attr' => [
                'class' => 'row mb-3'
            ]
        ])
        ->add('model', TextType::class, [
            'label' => 'Model',
            'row_attr' => [
                'class' => 'row mb-3'
            ]
        ])
        ->add('price', TextType::class, [
            'label' => 'Prix'
        ])
        ->add('mileage', TextType::class, [
            'label' => 'Kilométrage'
        ])
        ->add('year', TextType::class, [
            'label' => 'Année'
        ])
        ->add('fuel', ChoiceType::class, [
            'label' => 'Energie',
            'choices' => [
                'Essence' => 'Essence',
                'Diesel' => 'Diesel',
                'GPL' => 'GPL',
                'Électrique' => 'Électrique',
                'Hybride' => 'Hybride',
                'Hybride rechargeable' => 'Hybride rechargeable',
                'Bioéthanol' => 'Bioéthanol',
                'Hydrogène' => 'Hydrogène',
            ]
        ])
        ->add('description',TextareaType::class,[
            'label'=>"Description du véhicule"
        ])
            ->add('createdAt')
            ->add('updatedAt')
            ->add('slug')
            ->add('imgUne', FileType::class, [
                'label' => 'Image une',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/gif',
                            'image/jpeg',
                            'image/png',
                            'image/jpg',
                        ],
                        'mimeTypesMessage' => 'Veuillez télécharger une image valide',
                    ])
                ],
            ])
            ->add('imgDeux', FileType::class, [
                'label' => 'Image deux',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/gif',
                            'image/jpeg',
                            'image/png',
                            'image/jpg',
                        ],
                        'mimeTypesMessage' => 'Veuillez télécharger une image valide',
                    ])
                ],
            ])
            ->add('imgTrois', FileType::class, [
                'label' => 'Image trois',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/gif',
                            'image/jpeg',
                            'image/png',
                            'image/jpg',
                        ],
                        'mimeTypesMessage' => 'Veuillez télécharger une image valide',
                    ])
                ],
            ])
            ->add('imgQuatre', FileType::class, [
                'label' => 'Image quatre',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/gif',
                            'image/jpeg',
                            'image/png',
                            'image/jpg',
                        ],
                        'mimeTypesMessage' => 'Veuillez télécharger une image valide',
                    ])
                ],
            ])
            ->add('options')
            ->add('submit', SubmitType::class,[
                'label'=>'Poster l\'annonce', 
                'attr' => [
                    'class' => 'btn-custom btn-outline-secondary col-4 ms-5', // Ajoutez la classe CSS personnalisée ici
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Annonces::class,
        ]);
    }
}
