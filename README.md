Mdash bundle
============
This is a Symfony 2 bundle for [E. Muravjov's typograph](http://mdash.ru).

Installation is simple. Just drop this line into your `composer.json`'s `require` section:
```
"kix/mdash-bundle": "0.5.x"
```

Add the bundle into your `AppKernel.php`:

```
<?php
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            // ...
            new \Kix\MdashBundle\KixMdashBundle(),
        );
```

After installing, a new `mdash` Twig filter will be available in your templates. It should be used as follows (let's
assume that `article` object's `text` property contains text that needs proper formatting):

```
{{ article.text | mdash }}
```

Also, there's a `kix_mdash.typographer` service available that's an instance of `\EMT\EMTypograph`. You can always
request it from the container and use it in any way you like:

```
<?php
class SomeClass implements ContainerAwareInterface
{

    public function processText()
    {
        /** @var \EMT\EMTypograph $typographer */
        $typographer = $this->container->get('kix_mdash.typographer');
    }

}
```

Stats
-----
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/30cc388c-7a44-4386-8ba6-dec1c45cc4b7/small.png)](https://insight.sensiolabs.com/projects/30cc388c-7a44-4386-8ba6-dec1c45cc4b7)

[![Build Status](https://travis-ci.org/kix/mdash-bundle.svg?branch=master)](https://travis-ci.org/kix/mdash-bundle)
