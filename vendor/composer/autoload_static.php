<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit171657d51f8b4f57cd5fd112913ae773
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit171657d51f8b4f57cd5fd112913ae773::$classMap;

        }, null, ClassLoader::class);
    }
}
