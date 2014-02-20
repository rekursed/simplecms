<?php

namespace Zeteq\PageBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SiteType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('enabled')
                ->add('main')
                ->add('title')
                ->add('slogan')
                ->add('name')
                ->add('url')
                ->add('email')
                ->add('email_name')
                ->add('google_analytics')
                ->add('meta_description')
                ->add('meta_keywords')
                ->add('facebook_title')
                ->add('facebook_image')
                ->add('facebook_url')
                ->add('facebook_description')
                ->add('facebook_app_id')
                ->add('favicon_path')
                ->add('favicon')

        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Zeteq\PageBundle\Entity\Site'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'zeteq_pagebundle_site';
    }

}
