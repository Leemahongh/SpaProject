<?php

namespace App\Form;

use App\Entity\USERS;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class CreateUserType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('NOM', TextType::class, ['label' => 'Nom'])
            ->add('PRENOM',TextType::class, ['label' => 'Prénom'])
            ->add('USERNAME', TextType::class, ['label' => 'Nom d\'utilisateur'])
            ->add('PASSWORD', PasswordType::class, ['label' => 'Mot de Passe'], [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Rentrez un mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit contenir {{ limit }} caractères minimum',
                        'max' => 4096
                    ]),
                ],
            ])
            ->add('EMAIL', EmailType::class, ['label' => 'e-Mail'])
            ->add('BIRTHDAY', BirthdayType::class, ['label' => 'Date d\'aniversaire'])
            ->add('ADRESS', TextType::class, ['label' => 'Adresse'])
            ->add('POSTAL_CODE', TextType::class, ['label' => 'Code postal'])
            ->add('CITY', TextType::class, ['label' => 'Ville'])
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => USERS::class,
        ]);
    }

}
