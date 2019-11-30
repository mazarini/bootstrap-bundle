<?php

return [
    Mazarini\TestBundle\MazariniTestBundle::class => ['dev' => true, 'test' => true],
    Mazarini\BootstrapBundle\MazariniBootstrapBundle::class => ['all' => true],
    Mazarini\PackageBundle\MazariniPackageBundle::class => ['all' => true],
    Symfony\Bundle\FrameworkBundle\FrameworkBundle::class => ['all' => true],
    Symfony\Bundle\MakerBundle\MakerBundle::class => ['dev' => true],
    Symfony\Bundle\TwigBundle\TwigBundle::class => ['all' => true],
    Mazarini\ToolsBundle\MazariniToolsBundle::class => ['all' => true],
    Symfony\Bundle\WebProfilerBundle\WebProfilerBundle::class => ['dev' => true, 'test' => true],
    Symfony\Bundle\MonologBundle\MonologBundle::class => ['all' => true],
    Symfony\Bundle\DebugBundle\DebugBundle::class => ['dev' => true, 'test' => true],
];
