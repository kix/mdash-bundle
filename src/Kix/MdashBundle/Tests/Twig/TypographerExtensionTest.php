<?php
/**
 * Created by PhpStorm.
 * User: kix
 * Date: 03/06/14
 * Time: 13:18
 */

namespace Kix\MdashBundle\Tests\Twig;

use EMT\EMTypograph;
use Kix\MdashBundle\Twig\TypographerExtension;

/**
 * Class TypographerExtensionTest
 * @package Kix\MdashBundle\Tests\Twig
 */
class TypographerExtensionTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var \Kix\MdashBundle\Twig\TypographerExtension
     */
    private $extension;

    public function setUp()
    {
        $typograph       = new EMTypograph();
        $this->extension = new TypographerExtension($typograph);
    }

    public function testApply()
    {
        $source = <<<TEXT
Это - русскоязычный "текст" для проверки типографа.
TEXT;

        $result = $this->extension->mdashFilter($source);
        $expected = <<<TEXT
<p>Это&nbsp;&mdash; русскоязычный<span style="margin-right:0.44em;"> </span><span style="margin-left:-0.44em;">&laquo;</span>текст&raquo; для проверки типографа.</p>
TEXT;

        $this->assertEquals($expected, $result);
    }

} 