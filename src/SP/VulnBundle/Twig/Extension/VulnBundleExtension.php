<?php

namespace SP\VulnBundle\Twig\Extension;

class VulnBundleExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('mask', array($this, 'mask')),
        );
    }

    public function getName()
    {
        return 'vuln_bundle';
    }

    public function mask($account)
    {
        return substr_replace($account, str_repeat('*', 7), 5, 7);
    }
}
