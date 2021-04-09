<?php

namespace App\Form;

use App\Entity\Opportunite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OpportuniteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lanceur')
            ->add('logo')
            ->add('titre')
            ->add('type')
            ->add('date_deb')
            ->add('date_expir')
            ->add('region')
            ->add('description')
            ->add('date_publication')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Opportunite::class,
        ]);
    }
}
