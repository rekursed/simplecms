<?php
namespace Zeteq\BlogBundle\Extensions;

use  Zeteq\BlogBundle\Extensions\Blog;

class BlogExtension extends \Twig_Extension
{
    protected $blog;

    function __construct(Blog $blog) {
        $this->blog = $blog;
    }

    public function getGlobals() {
        return array(
            'blog' => $this->blog
        );
    }

    public function getName()
    {
        return 'blog';
    }

}
