<?php
/**
 * Created by PhpStorm.
 * User: Админ
 * Date: 24.11.2019
 * Time: 21:33
 */

class Autoload
{
    public function loadClass($className)
    {
        $file = str_replace(
                ['App\\', '\\'],
                [$_SERVER['DOCUMENT_ROOT'] ."/", '/'],
                $className
            ). '.php';
        if (file_exists($file)) {
            include $file;
        }
    }
}