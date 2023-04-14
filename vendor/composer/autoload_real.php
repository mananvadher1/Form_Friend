<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInita48eeb429f1eb6f5ae269cd655818ecf
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInita48eeb429f1eb6f5ae269cd655818ecf', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInita48eeb429f1eb6f5ae269cd655818ecf', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInita48eeb429f1eb6f5ae269cd655818ecf::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}