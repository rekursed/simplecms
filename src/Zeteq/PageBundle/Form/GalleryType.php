<?php

namespace Zeteq\PageBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GalleryType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('images', 'collection', array(
                    'type' => new ImageType(),
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
            'data_class' => 'Zeteq\PageBundle\Entity\Gallery'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'zeteq_pagebundle_gallery';
    }
}
