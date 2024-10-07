<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1e538d99ddd4e10021987710d304bde9
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\Views\\' => 10,
            'App\\Models\\' => 11,
            'App\\Enums\\' => 10,
            'App\\Core\\' => 9,
            'App\\Controllers\\' => 16,
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\Views\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App/Views',
        ),
        'App\\Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App/Models',
        ),
        'App\\Enums\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App/Enums',
        ),
        'App\\Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App/Core',
        ),
        'App\\Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App/Controllers',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1e538d99ddd4e10021987710d304bde9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1e538d99ddd4e10021987710d304bde9::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1e538d99ddd4e10021987710d304bde9::$classMap;

        }, null, ClassLoader::class);
    }
}
