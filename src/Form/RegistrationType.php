<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('password', PasswordType::class)
            ->add('firstname')
            ->add('lastname')
            ->add('cellphone')
            ->add('emailSponsorship')
            ->add('bornAt', BirthdayType::class, ['format' => 'dd-M-yyyy',])
            ->add('realEstateProjects')
            ->add('bankDetails')
            ->add('description')
            ->add('hasNewsletter')
            ->add('siret')
            ->add('status')
            ->add('author', null, ['choice_label' => 'email'])
            ->add('level', null, ['choice_label' => 'name'])
            ->add('civility', null, ['choice_label' => 'name'])
            ->add('histories', null, ['choice_label' => 'name'])
            ->add('profiles', null, ['choice_label' => 'name'])
            ->add('group', null, ['choice_label' => 'name'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
