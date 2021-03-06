<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite9e0343de62e6d525c8ae6ede036ae50
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Sunriseqf\\JunitLaravel\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Sunriseqf\\JunitLaravel\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite9e0343de62e6d525c8ae6ede036ae50::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite9e0343de62e6d525c8ae6ede036ae50::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
