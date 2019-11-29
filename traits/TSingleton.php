<?php
/**
 * Created by PhpStorm.
 * User: Админ
 * Date: 28.11.2019
 * Time: 14:28
 */

trait TSingleton
{
    private static $items;

    protected function __construct(){}
    protected function __clone(){}
    protected function __wakeup(){}

    /**
     * Создание одного единственного экземпляра класса
     * @return mixed
     */
    public static function getInstance()
    {
        if (empty(static::$items)) {
            static::$items = new static();
        }
        return static::$items;
    }
}