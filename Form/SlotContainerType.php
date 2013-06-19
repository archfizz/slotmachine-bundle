<?php

namespace SlotMachine\SlotBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SlotContainerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('delimiter')
            ->add('undefinedCardResolution')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SlotMachine\SlotBundle\Entity\SlotContainer'
        ));
    }

    public function getName()
    {
        return 'slotmachine_slotbundle_slotcontainertype';
    }
}
