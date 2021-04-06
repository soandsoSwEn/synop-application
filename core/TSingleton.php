<?php

namespace Synop_Application\core;

/**
 * Trait TSingleton implements the Singleton design pattern for the basic application methods to work
 * @package Synop_Application\core
 */
trait TSingleton
{
    private static $instance;

    public static function instance($data = null)
    {
        if (self::$instance === null) {
            self::$instance = new self($data ?? null);
        }

        return self::$instance;
    }
}