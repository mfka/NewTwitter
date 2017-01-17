<?php
/**
 * Created by PhpStorm.
 * User: mfka
 * Date: 12.12.16
 * Time: 08:40
 */

function autoLoader($className)
{
    $dirs = array(
        '/',
        '/class/',
        '/../models/'
    );

    $files = array(
        '%s.php',
        '%s.class.php',
        'class.%s.php',
        '%sController.php'
    );

    foreach ($dirs as $dir) {
        foreach ($files as $file) {
            $path = __DIR__ . $dir . sprintf($file, $className);
            if (file_exists($path)) {
                include_once $path;
                return;
            }
        }
    }

}

spl_autoload_register('autoLoader');