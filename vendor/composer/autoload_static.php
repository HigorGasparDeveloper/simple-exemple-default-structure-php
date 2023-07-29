<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd4b1fe5a7f97c73c72777c0d2e1ea21d
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd4b1fe5a7f97c73c72777c0d2e1ea21d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd4b1fe5a7f97c73c72777c0d2e1ea21d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd4b1fe5a7f97c73c72777c0d2e1ea21d::$classMap;

        }, null, ClassLoader::class);
    }
}
