<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
                'constraints' => new Length([
                    'min' =>2,
                    'max'=>30
                    ]),
                'attr' =>  [
                    'placeholder' => 'Ex: John'
                ]
            ])
            ->add('lastname',  TextType::class, [
                'label' => 'Nom',
                'attr' =>  [
                    'placeholder' => 'Ex: Doe'
                    ]
            ])
            ->add('email', EmailType::class,[
                'label' => 'Email',
                'attr' =>  [
                    'placeholder' => 'Ex: John@Doe.com'
                ]
            ])
            ->add('password', RepeatedType::class,[
                'type' => PasswordType::class,
                'invalid_message' => ' Veuillez entrer un mot de passe identique',
                'label' => 'Mot de passe',
                'required' => true,
                'first_options' => [ 
                    'label' => 'Mot de passe',
                    'attr' =>  [
                        'placeholder' => 'Ex: •••••••'
                    ]
                    
                ],
                'second_options' => [
                    'label' => 'Confirmez mot de passe',
                    'attr' =>  [
                        'placeholder' => 'Ex: •••••••'
                    ]
                    ]
                
            ])


            ->add('submit', SubmitType::class,[
                'label' => 'S\'inscrire'
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
