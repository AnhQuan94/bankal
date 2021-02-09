<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class,[
                'disabled' => true,
                'label'=> 'Email'
            ])
            ->add('firstname', TextType::class,[
                'disabled' => true,
                'label'=> 'Prénom'
            ])
            ->add('lastname', TextType::class,[
                'disabled' => true,
                'label'=> 'Nom'
            ])
            ->add('old_password', PasswordType::class,[
                'label'=> 'Mot de passe actuel',
                'mapped'=>false,
                'attr'=>[
                    'placeholder' => 'Ex: •••••••'
                ]
            ])
            ->add('new_password', RepeatedType::class,[
                'type' => PasswordType::class,
                'mapped'=> false,
                'invalid_message' => ' Ex: •••••••',
                'label' => 'Nouveau mot de passe',
                'required' => true,
                'first_options' => [ 
                    'label' => 'Nouveau mot de passe',
                    'attr' =>  [
                        'placeholder' => 'Ex: •••••••'
                    ]
                    
                ],
                'second_options' => [
                    'label' => 'Confirmez le nouveau mot de passe',
                    'attr' =>  [
                        'placeholder' => 'Ex: •••••••'
                    ]
                    ]
                
            ])

            ->add('submit', SubmitType::class,[
                'label' => 'Changer de mot de passe'
            ])

            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}