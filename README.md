<!--suppress HtmlDeprecatedAttribute -->
<div align="center">

# IDMarinas Twig Tracy Bar

![GitHub release](https://img.shields.io/github/release/idmarinas/tracy-twig-bar.svg?style=for-the-badge)
![GitHub Release Date](https://img.shields.io/github/release-date/idmarinas/tracy-twig-bar.svg?style=for-the-badge)

</div>

> Add Twig template info in the **Tracy** debugger bar.

<br />

<div align="center">

[![Test Suite](https://img.shields.io/github/actions/workflow/status/idmarinas/tracy-twig-bar/php.yml?branch=master&style=for-the-badge&logo=github&logoColor=white&label=Lotgd%20Test%20Suite)][test-suit]
[![Quality Gate Status](https://img.shields.io/sonar/quality_gate/SONAR_PROJECT_NAME_CHANGE_ME/master?server=https%3A%2F%2Fsonarcloud.io&style=for-the-badge&logo=sonarcloud&logoColor=white)](https://sonarcloud.io/summary/new_code?id=SONAR_PROJECT_NAME_CHANGE_ME)
[![Coverage](https://img.shields.io/sonar/coverage/SONAR_PROJECT_NAME_CHANGE_ME/master?server=https%3A%2F%2Fsonarcloud.io&style=for-the-badge&logo=sonarcloud&logoColor=white)][sonarcloud]
[![Technical Debt](https://img.shields.io/sonar/tech_debt/SONAR_PROJECT_NAME_CHANGE_ME/master?server=https%3A%2F%2Fsonarcloud.io&style=for-the-badge&logo=sonarcloud&logoColor=white)][sonarcloud]

<br />

![Github commits (since latest release)](https://img.shields.io/github/commits-since/idmarinas/tracy-twig-bar/latest/master?style=for-the-badge)
![GitHub commit activity](https://img.shields.io/github/commit-activity/w/idmarinas/tracy-twig-bar/master?style=for-the-badge)
![GitHub last commit](https://img.shields.io/github/last-commit/idmarinas/tracy-twig-bar/master?style=for-the-badge)

#### Code analysis

[![Reliability Rating](https://sonarcloud.io/api/project_badges/measure?project=SONAR_PROJECT_NAME_CHANGE_ME&branch=master&metric=reliability_rating)][sonarcloud]
[![Bugs](https://sonarcloud.io/api/project_badges/measure?project=SONAR_PROJECT_NAME_CHANGE_ME&branch=master&metric=bugs)][sonarcloud]
[![Security Rating](https://sonarcloud.io/api/project_badges/measure?project=SONAR_PROJECT_NAME_CHANGE_ME&branch=master&metric=security_rating)][sonarcloud]
[![Vulnerabilities](https://sonarcloud.io/api/project_badges/measure?project=SONAR_PROJECT_NAME_CHANGE_ME&branch=master&metric=vulnerabilities)][sonarcloud]
[![Maintainability Rating](https://sonarcloud.io/api/project_badges/measure?project=SONAR_PROJECT_NAME_CHANGE_ME&branch=master&metric=sqale_rating)][sonarcloud]
[![Code Smells](https://sonarcloud.io/api/project_badges/measure?project=SONAR_PROJECT_NAME_CHANGE_ME&branch=master&metric=code_smells)][sonarcloud]
[![Duplicated Lines (%)](https://sonarcloud.io/api/project_badges/measure?project=SONAR_PROJECT_NAME_CHANGE_ME&branch=master&metric=duplicated_lines_density)][sonarcloud]

</div>

> ## 🖖 Support
>
> 🩵 If you like this project, give it a 🌟 and share it with your friends!
>
> [![PayPal.Me - The safer, easier way to pay online!](https://img.shields.io/badge/donate-help_my_projects-ffaa29.svg?style=for-the-badge&logo=paypal&cacheSeconds=86400)](https://www.paypal.me/idmarinas)
> [![Liberapay - Donate](https://img.shields.io/liberapay/receives/IDMarinas.svg?style=for-the-badge&logo=liberapay&cacheSeconds=86400)](https://liberapay.com/IDMarinas/donate)
> [![GitHub Sponsor](https://img.shields.io/badge/Sponsor-ea4aaa?style=for-the-badge&logo=github&logoColor=white)](https://github.com/sponsors/idmarinas)


<br />

<!-- readme-template -->

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

<!-- readme-template -->

## 🖱️ Tech used in code

![GitHub code size in bytes](https://img.shields.io/github/languages/code-size/idmarinas/tracy-twig-bar.svg?style=for-the-badge)
[![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net)

## 🛠️ Tools used to create this project

![Dependabot](https://img.shields.io/badge/dependabot-025E8C?style=for-the-badge&logo=dependabot&logoColor=white)
[![GitHub Actions](https://img.shields.io/badge/github%20actions-%232671E5.svg?style=for-the-badge&logo=githubactions&logoColor=white)](https://github.com/features/actions)
[![Docker](https://img.shields.io/badge/docker-%230db7ed.svg?style=for-the-badge&logo=docker&logoColor=white)](https://www.docker.com)
[![Composer](https://img.shields.io/badge/composer-%238c5530?style=for-the-badge&logo=composer&logoColor=white)](https://getcomposer.org)

## 💬 Social

[![X](https://img.shields.io/badge/Twitter-%23000000.svg?style=for-the-badge&logo=X&logoColor=white)](https://x.com/idmarinas)
[![Discord](https://img.shields.io/badge/Discord-IDMarinas-blue?logo=discord&style=for-the-badge&logoColor=white)](https://discord.gg/FXEZqpF)

[//]: # (@formatter:off)
[sonarcloud]: https://sonarcloud.io/dashboard?id=SONAR_PROJECT_NAME_CHANGE_ME
[test-suit]: https://github.com/idmarinas/tracy-twig-bar/actions/workflows/php.yml
