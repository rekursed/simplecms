<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle(),
            new Zeteq\UserBundle\ZeteqUserBundle(),
            new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),      
           new Madalynn\Bundle\PlumBundle\MadalynnPlumBundle(),
           new APY\DataGridBundle\APYDataGridBundle(),
             new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),
            new Zeteq\PageBundle\ZeteqPageBundle(),
                    new Trsteel\CkeditorBundle\TrsteelCkeditorBundle(),
        new Exercise\HTMLPurifierBundle\ExerciseHTMLPurifierBundle(),
            new Zeteq\AdminBundle\ZeteqAdminBundle(),
           new Avalanche\Bundle\ImagineBundle\AvalancheImagineBundle(),
             new FM\ElfinderBundle\FMElfinderBundle(),
		 new Genemu\Bundle\FormBundle\GenemuFormBundle(),
            new Zeteq\BlogBundle\ZeteqBlogBundle(),
            new Zeteq\FrontBundle\ZeteqFrontBundle(),
                new Zeteq\FileManagerBundle\ZeteqFileManagerBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {

            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
    

}
