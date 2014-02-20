<?php

namespace Zeteq\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BlogPostType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('slug')
            ->add('category')

            ->add('sort')
            ->add('enabled')
                ->add('overview')
            ->add('body','ckeditor')
        
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Zeteq\BlogBundle\Entity\BlogPost'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'zeteq_blogbundle_blogpost';
    }
}
