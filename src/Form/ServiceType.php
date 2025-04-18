<?php

namespace App\Form;

use App\Entity\Service;
use App\Entity\Utilisateur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ServiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('description')
            ->add('expertise')
            ->add('dureeJours')
            ->add('prix')
            ->add('modePaiement')
            ->add('creeLe', null, [
                'widget' => 'single_text',
            ])
            ->add('misAJourLe', null, [
                'widget' => 'single_text',
            ])
            ->add('freelance', EntityType::class, [
                'class' => Utilisateur::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Service::class,
        ]);
    }
}
