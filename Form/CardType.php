<?php

namespace SlotMachine\SlotBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CardType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('reelIndex')
            ->add('value')
            ->add('alias')
            ->add('reel')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SlotMachine\SlotBundle\Entity\Card'
        ));
    }

    public function getName()
    {
        return 'slotmachine_slotbundle_cardtype';
    }
}
