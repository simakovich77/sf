<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;
use App\Service\MarkdownHelper;

class AppExtesnsion extends AbstractExtension
{
    /**
     * @var MarkdownHelper
     */
    private $helper;

    public function __construct(MarkdownHelper $helper)
    {

        $this->helper = $helper;
    }
    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/2.x/advanced.html#automatic-escaping
            new TwigFilter('cache_markdown', [$this, 'processMarkdown']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('function_name', [$this, 'processMarkdown']),
        ];
    }

    public function processMarkdown($value)
    {
        // ...
        return $this->helper->parse($value);
    }
}
