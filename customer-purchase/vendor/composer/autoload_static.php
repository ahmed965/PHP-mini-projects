<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit349f5772d2cede6d8f6b842b3377165b
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit349f5772d2cede6d8f6b842b3377165b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit349f5772d2cede6d8f6b842b3377165b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit349f5772d2cede6d8f6b842b3377165b::$classMap;

        }, null, ClassLoader::class);
    }
}
