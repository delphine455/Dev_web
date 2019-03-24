<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TachesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom',null,array('label'=>'nom'))->add('description',null,array('label'=>'description'))->add('dateDebut',null,array('label'=>'datedebut'))->add('dateFin',null,array('label'=>'datefin'))->add('dateRealisation',null,array('label'=>'daterealisation'))->add('etat',null,array('label'=>'etat'))->add('projet',null,array('label'=>'projet'))->add('user',null,array('label'=>'user'));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Taches'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_taches';
    }


}
