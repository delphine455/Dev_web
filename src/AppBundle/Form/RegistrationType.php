<?php
// src/AppBundle/Form/RegistrationType.php

namespace AppBundle\Form ;

use Symfony\Component\Form\AbstractType ;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface ;

class RegistrationType extends AbstractType
{
    public function buildForm ( FormBuilderInterface $builder , array $options )
    {
        $builder -> add ( 'nom' );
        $builder -> add ( 'prenom' );
        $builder -> add ( 'dateNaissance' );
        $builder -> add ( 'competences' );
        $builder -> add ( 'roles', ChoiceType::class, array(
            'choices' => array(
                'CHEF' => 'ROLE_CHEF',
                'DEV' => 'ROLE_DEV'
            ),
            'expanded'=> true,
            'multiple'=> true,
            'required'=> true

        ) );


    }

    public function getParent ()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType' ;
    }

    public function getBlockPrefix ()
    {
        return 'app_user_registration' ;
    }

}