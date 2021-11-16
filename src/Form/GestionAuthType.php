<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\User;

use App\Repository\UserRepository;

class GestionAuthType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, $users): void
    {
        $builder
            ->add('user', EntityType::class, [
                'class' => User::class,
                'placeholder' => 'Sélectionne un utilisateur',
                'choice_label' => 'email',
                'label' => 'Ville : ',
                'mapped' => false,
                'required' => true
            ])
            ->add('role', ChoiceType::class, [
                    'choices'  => 
                        ["User" => 'ROLE_USER', 
                        "Membre" => 'ROLE_MEMBRE',
                        "Support" => 'ROLE_SUPPORT',
                        "Sociétaire" => 'ROLE_SOCIETAIRE',
                        "Admin" => 'ROLE_ADMIN'
                        ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
