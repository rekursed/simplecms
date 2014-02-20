<?php

namespace Zeteq\PageBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MenuType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('links', 'collection', array(
                    'type' => new LinkType(),
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Zeteq\PageBundle\Entity\Menu'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'zeteq_pagebundle_menu';
    }
}
