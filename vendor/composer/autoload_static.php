<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit63546bd2627130487e97d5d16f36ba5a
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit63546bd2627130487e97d5d16f36ba5a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit63546bd2627130487e97d5d16f36ba5a::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
