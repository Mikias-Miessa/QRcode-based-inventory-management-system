<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInita336c42fb7fe5f3fb9e2acb3b7ba0680
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

        spl_autoload_register(array('ComposerAutoloaderInita336c42fb7fe5f3fb9e2acb3b7ba0680', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInita336c42fb7fe5f3fb9e2acb3b7ba0680', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInita336c42fb7fe5f3fb9e2acb3b7ba0680::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
