<?php

namespace App\Form;

use App\Entity\Annonces;
use App\Entity\Options;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OptionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('gps',ChoiceType::class,[
                'label'=>'Système de navigation GPS ',
                'choices'=>[
                    'Oui'=>'Oui',
                    'Non'=>'Non'
                ]
            ])
            ->add('regulateur',ChoiceType::class,[
                'label'=>'Régulateur de vitesse',
                'choices'=>[
                    'Oui'=>'Oui',
                    'Non'=>'Non'
                ]
            ])
            ->add('limitateur',ChoiceType::class,[
                'label'=>'Limitateur de vitesse',
                'choices'=>[
                    'Oui'=>'Oui',
                    'Non'=>'Non'
                ]
            ])
            ->add('clim',ChoiceType::class,[
                'label'=>'Climatisation automatique',
                'choices'=>[
                    'Oui'=>'Oui',
                    'Non'=>'Non'
                ]
            ])
            ->add('sfu',ChoiceType::class,[
                'label'=>'Système de freinage d\'urgence ',
                'choices'=>[
                    'Oui'=>'Oui',
                    'Non'=>'Non'
                ]
            ])
            ->add('sac',ChoiceType::class,[
                'label'=>'Système d\'aide à la conduite',
                'choices'=>[
                    'Oui'=>'Oui',
                    'Non'=>'Non'
                ]
            ])
            ->add('bluetooth',ChoiceType::class,[
                'label'=>'Connectivité Bluetooth ',
                'choices'=>[
                    'Oui'=>'Oui',
                    'Non'=>'Non'
                ]
            ])
            ->add('camera',ChoiceType::class,[
                'label'=>'Caméra de recul',
                'choices'=>[
                    'Oui'=>'Oui',
                    'Non'=>'Non'
                ]
            ])
            ->add('sas',ChoiceType::class,[
                'label'=>'Système d\'assistance au stationnement automatique',
                'choices'=>[
                    'Oui'=>'Oui',
                    'Non'=>'Non'
                ]
            ])
            ->add('annonce', EntityType::class, [
                'class' => Annonces::class, // Entité cible de la relation
                'label' => 'Annonce',
                'choice_label' => 'id', // Propriété de l'entité à afficher dans le formulaire
                'disabled' => true, // Rend le champ en lecture seule
                'required' => true, // Le champ est obligatoire
            ])


            ->add('submit',SubmitType::class,[
                'label'=>'ajouté les options',
                'attr' => [
                    'class' => 'btn-custom btn-outline-secondary col-4 ms-5 ', // Ajoutez la classe CSS personnalisée ici
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Options::class,
        ]);
    }
}
