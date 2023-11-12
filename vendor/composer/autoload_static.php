<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit706b1473d6f1066dc965460a5f3bf980
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'ReallySimpleJWT\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'ReallySimpleJWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/rbdwllr/reallysimplejwt/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit706b1473d6f1066dc965460a5f3bf980::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit706b1473d6f1066dc965460a5f3bf980::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit706b1473d6f1066dc965460a5f3bf980::$classMap;

        }, null, ClassLoader::class);
    }
}
