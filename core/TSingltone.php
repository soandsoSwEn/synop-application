<?php

namespace Synop_Application\core;

trait TSingltone
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