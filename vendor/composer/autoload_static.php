<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit376ec5e31b4e914090c0b93b59d27068
{
    public static $files = array (
        '9f394da3192a168c4633675768d80428' => __DIR__ . '/..' . '/nwidart/laravel-modules/src/helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'N' => 
        array (
            'Nwidart\\Modules\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Nwidart\\Modules\\' => 
        array (
            0 => __DIR__ . '/..' . '/nwidart/laravel-modules/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit376ec5e31b4e914090c0b93b59d27068::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit376ec5e31b4e914090c0b93b59d27068::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit376ec5e31b4e914090c0b93b59d27068::$classMap;

        }, null, ClassLoader::class);
    }
}
