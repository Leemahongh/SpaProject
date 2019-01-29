<?php

namespace App\Form;

use App\Entity\USERS;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('NOM')
            ->add('PRENOM')
            ->add('USERNAME')
            ->add('PASSWORD')
            ->add('EMAIL')
            ->add('BIRTHDAY')
            ->add('CREATED_AT')
            ->add('ADRESS')
            ->add('POSTAL_CODE')
            ->add('CITY')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => USERS::class,
        ]);
    }
}
