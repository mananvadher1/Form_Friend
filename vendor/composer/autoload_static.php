<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita48eeb429f1eb6f5ae269cd655818ecf
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita48eeb429f1eb6f5ae269cd655818ecf::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita48eeb429f1eb6f5ae269cd655818ecf::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita48eeb429f1eb6f5ae269cd655818ecf::$classMap;

        }, null, ClassLoader::class);
    }
}
