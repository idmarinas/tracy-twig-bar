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

namespace Idmarinas\TracyPanel;

use Tracy\Debugger;
use Tracy\Helpers;
use Tracy\IBarPanel;
use Twig\Profiler\Profile;

/**
 * Class TwigBar.
 */
class TwigBar implements IbarPanel
{
    protected $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#4E910C" d="M8.932 22.492c.016-6.448-.971-11.295-5.995-11.619 4.69-.352 7.113 2.633 9.298 6.907C12.205 6.354 9.882 1.553 4.8 1.297c7.433.07 10.028 5.9 11.508 14.293 1.171-2.282 3.56-5.553 5.347-1.361-1.594-2.04-3.607-1.617-3.978 8.262H8.933z"></path></svg>';

    protected $profiler;

    protected $name = 'main';

    protected $twigEngine;

    protected $templateCount = 0;

    protected $blockCount    = 0;

    protected $macroCount    = 0;

    protected $templates     = [];

    /**
     * Initialize the panel.
     */
    public function __construct(Profile $profile)
    {
        $this->profiler = $profile;
    }

    /**
     * Create and initialize a new TwigBar tab/panel.
     * The panel will be attach to the Tracy Debugger Bar.
     *
     * @param Profile $profiler
     */
    public static function init($profiler): void
    {
        Debugger::getBar()->addPanel(new static($profiler));
    }

    /**
     * {@inheritdoc}
     *
     * @SuppressWarnings(PHPMD.UnusedLocalVariable)
     */
    public function getPanel(): string
    {
        $this->processData($this->profiler);

        return Helpers::capture(function (): void
        {
            $duration = $this->formatDuration($this->profiler->getDuration());
            $memory = $this->formatBytes($this->profiler->getMemoryUsage());

            require __DIR__.'/../templates/panel.phtml';
        });
    }

    /**
     * {@inheritdoc}
     *
     * @SuppressWarnings(PHPMD.UnusedLocalVariable)
     */
    public function getTab(): string
    {
        return Helpers::capture(function (): void
        {
            $duration = $this->formatDuration($this->profiler->getDuration());
            $show = (bool) \count($this->profiler->getProfiles());

            require __DIR__.'/../templates/tab.phtml';
        });
    }

    public function formatBytes(string $size, int $precision = 2): string
    {
        if (0 === $size || null === $size)
        {
            return '0B';
        }

        $sign = $size < 0 ? '-' : '';
        $size = \abs($size);

        $base     = \log($size) / \log(1024);
        $suffixes = ['B', 'KB', 'MB', 'GB', 'TB'];

        return $sign.\round(1024 ** ($base - \floor($base)), $precision).$suffixes[\floor($base)];
    }

    private function formatDuration(float $seconds): string
    {
        $duration = \round($seconds, 2).'s';

        if ($seconds < 0.001)
        {
            $duration = \round($seconds * 1000000).'μs';
        }
        elseif ($seconds < 0.1)
        {
            $duration = \round($seconds * 1000, 2).'ms';
        }
        elseif ($seconds < 1)
        {
            $duration = \round($seconds * 1000).'ms';
        }

        return $duration;
    }

    private function processData(Profile $profile): void
    {
        $this->templateCount += ($profile->isTemplate() ? 1 : 0);
        $this->blockCount    += ($profile->isBlock() ? 1 : 0);
        $this->macroCount    += ($profile->isMacro() ? 1 : 0);

        if ($profile->isTemplate())
        {
            $this->templates[$profile->getName()] = [
                'name'     => $profile->getName(),
                'duration' => $this->formatDuration($profile->getDuration()),
                'memory'   => $this->formatBytes($profile->getMemoryUsage()),
            ];
        }

        foreach ($profile as $p)
        {
            $this->processData($p);
        }
    }
}
