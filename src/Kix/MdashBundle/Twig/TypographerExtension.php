<?php
namespace Kix\MdashBundle\Twig;
use EMT\EMTypograph;

/**
 * Class TypographerExtension
 * @package Kix\MdashBundle
 */
class TypographerExtension extends \Twig_Extension
{

    private $typographer;

    private $options;

    public function __construct(EMTypograph $typographer, array $options = array())
    {
        $this->typographer = $typographer;
        $this->options     = $options;
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'kix_mdash';
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('mdash', array($this, 'mdashFilter', array()))
        );
    }

    /**
     * @param $text
     * @return string
     */
    public function mdashFilter($text)
    {
        return $this->typographer->fast_apply($text, $this->options);
    }

} 