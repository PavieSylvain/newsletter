<?php

namespace App\Form;

use App\Entity\NewsLetter;
use App\Entity\user;
use App\Repository\UserRepository;
use App\Repository\MailerPlanningRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use DateInterval;


class NewsLetterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, $options): void
    {
        $plannedAt = new \DateTimeImmutable;
        $plannedAt = $plannedAt->add(new DateInterval('PT2H'));
        
        if(array_key_exists('data', $options)){
            if($options['data']->getPublishedAt()){
                $disable = true;
            } else {
                $disable = false;
            }

            $mailerPLanning = $options['data']->getMailerPlanning();
            if($mailerPLanning){
                $plannedAt = $mailerPLanning->getPlannedAt();
            }
        } else {
            $disable = false;
        }

        $builder
            ->add('title', null, [
                'row_attr' => ['class' => 'input-group'],
                'label' => "Titre",
                'disabled' => $disable,
            ])
            ->add('description', CKEditorType::class, [
                'config_name' => 'ultrabasic',
                'config' => array(
                    'width' => '100%',
                    'height' => '300px',
                ),
                'row_attr' => ['class' => 'input-group'],
                'label' => 'Description',
                'disabled' => $disable,
            ])
            ->add('select', ChoiceType::class, [
                'label' => 'Sélection',
                'choices'  => [
                    'Tous' => 'all',
                    'VIP' => 'vip',
                    'Ambassadeur' => 'ambassador'
                    ],
                'expanded' => true,
                'multiple' => true,
                'required' => false,
                'mapped' => false,
            ])
            ->add('send_list' , EntityType::class , array(
                'class' => User::class,
                'query_builder' => function (UserRepository $userRepository) {
                    return $userRepository->createQueryBuilder('u')
                                          ->andWhere('u.hasNewsletter = 1')
                                          ->orderBy('u.id', 'ASC');
                },
                'mapped' => false,
                'label' => 'Liste d\'envoi',
                'expanded' => true,
                'multiple' => true,
                'required' => false,
                'choice_label' => false,
                'choice_attr' => function($val, $key, $index) {
                    return array(
                        'required' => false,
                        'status' => $val->getStatus(),
                        'name' => $val->getFirstName() . " " . $val->getLastName(),
                        'email' => $val->getEmail(),
                        'class' => $val->getStatus(),
                    );
                },
            ))
            ->add('planning_newsletter', CheckboxType::class, [
                'label' => 'Planifier un envoie',
                'mapped' => false,
                'required' => false,
                'value' => true,
            ]
            )
            ->add('publishedAt', DateTimeType::class, [
                'widget' => 'choice',
                'required' => false,
                'input' => 'datetime_immutable',
                'mapped' => false,
                'placeholder' => [
                    'year' => 'Annnée', 'month' => 'Mois', 'day' => 'Jour',
                    'hour' => 'Heure', 'minute' => 'Minute', 
                    'type' => 'datetime-local',
                    'model_timezone' => 'Europe/Paris',
                ],
                'label' => false,
                'data' => $plannedAt,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => NewsLetter::class,
        ]);
    }
}
