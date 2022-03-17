<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1a3cfc24698921297c01bf5a1ffa6341
{
    public static $prefixLengthsPsr4 = array (
        'B' => 
        array (
            'B35\\WoocommerceVatField\\' => 24,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'B35\\WoocommerceVatField\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit1a3cfc24698921297c01bf5a1ffa6341::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1a3cfc24698921297c01bf5a1ffa6341::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1a3cfc24698921297c01bf5a1ffa6341::$classMap;

        }, null, ClassLoader::class);
    }
}