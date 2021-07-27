![GitHub release](https://img.shields.io/github/release/idmarinas/tracy-twig-bar.svg)
![GitHub Release Date](https://img.shields.io/github/release-date/idmarinas/tracy-twig-bar.svg)
![GitHub code size in bytes](https://img.shields.io/github/languages/code-size/idmarinas/tracy-twig-bar)
[![Build in PHP](https://img.shields.io/badge/PHP-^7.2-8892BF.svg?logo=php)](http://php.net/)

![GitHub issues](https://img.shields.io/github/issues/idmarinas/tracy-twig-bar.svg)
![GitHub pull requests](https://img.shields.io/github/issues-pr/idmarinas/tracy-twig-bar.svg)
![Github commits (since latest release)](https://img.shields.io/github/commits-since/idmarinas/tracy-twig-bar/latest.svg)
![GitHub commit activity](https://img.shields.io/github/commit-activity/w/idmarinas/tracy-twig-bar.svg)
![GitHub last commit](https://img.shields.io/github/last-commit/idmarinas/tracy-twig-bar.svg)

![GitHub top language](https://img.shields.io/github/languages/top/idmarinas/tracy-twig-bar.svg)
![GitHub language count](https://img.shields.io/github/languages/count/idmarinas/tracy-twig-bar.svg)

[![Maintainability](https://api.codeclimate.com/v1/badges/4553239eac9e717f1cce/maintainability)](https://codeclimate.com/github/idmarinas/tracy-twig-bar/maintainability)
![Code Climate technical debt](https://img.shields.io/codeclimate/tech-debt/idmarinas/tracy-twig-bar?cacheSeconds=86400)

[![PayPal.Me - The safer, easier way to pay online!](https://img.shields.io/badge/donate-help_my_project-ffaa29.svg?logo=paypal&cacheSeconds=86400)](https://www.paypal.me/idmarinas)
[![Liberapay - Donate](https://img.shields.io/liberapay/receives/IDMarinas.svg?logo=liberapay&cacheSeconds=86400)](https://liberapay.com/IDMarinas/donate)
[![Twitter](https://img.shields.io/twitter/url/http/shields.io.svg?style=social&cacheSeconds=86400)](https://twitter.com/idmarinas)

# Twig Panel for Tracy #

Add Twig template info in the **Tracy** debugger bar.

![](docs/bar.png)

![](docs/panel.png)

## Installation ##

### Composer ###

```bash
composer require --dev idmarinas/tracy-twig-bar
```

## Usage ##

Somewhere, when your application start and you initialize Twig engine

```php
use Idmarinas\TracyPanel\TwigBar;
use Idmarinas\TracyPanel\Twig\TracyExtension;
use Twig\Environment;
use Twig\Extension\ProfilerExtension;
use Twig\Profiler\Profile;

// ...
$profile = new Profile();
$env = new Environment($loader, $options);
$env->addExtension(new ProfilerExtension($profile));

/**
 * Optional Twig Extension.
 *
 * Can use `dump`, `dumpe` and `bdump` functions of Tracy
 */
$env->addExtension(new TracyExtension()); //-- Optional

TwigBar::init($profile);
```
