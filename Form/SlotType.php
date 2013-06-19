<?php

namespace SlotMachine\SlotBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SlotType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('undefinedCardResolution')
            ->add('reels')
            ->add('queryKeys')
            ->add('container')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SlotMachine\SlotBundle\Entity\Slot'
        ));
    }

    public function getName()
    {
        return 'slotmachine_slotbundle_slottype';
    }
}
