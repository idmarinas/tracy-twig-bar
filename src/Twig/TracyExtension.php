<?php

/**
 * Tracy Twig Bar.
 *
 * @see      https://github.com/idmarinas/tracy-twig-bar
 *
 * @author    IDMarinas
 * @copyright Copyright (c) 2021 Iván Diaz Marinas, IDMarinas.
 * @license   See LICENSE.md
 */

namespace Idmarinas\TracyPanel\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class TracyExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('dump', 'dump'),
            new TwigFunction('dumpe', 'dumpe'),
            new TwigFunction('bdump', 'bdump'),
        ];
    }
}
