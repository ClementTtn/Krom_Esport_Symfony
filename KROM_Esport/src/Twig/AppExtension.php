<?php
namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
    public function getFilters()
    {
        return array(
            new TwigFilter('unescape', array($this, 'unescape')),
        );
    }

    public function unescape($value)
    {
        return html_entity_decode($value);
    }
}
