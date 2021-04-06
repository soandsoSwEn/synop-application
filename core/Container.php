<?php


namespace Synop_Application\core;


/**
 * Class Container contains basic methods for working with application dependencies
 * @package Synop_Application\core
 */
class Container
{
    protected static $properties = [];


    public static $objects = [];


    public function onComponent($components)
    {
        if (count($components) == 0) {
            return true;
        }

        foreach ($components as $key => $value)
        {
            self::$objects[$key] = new $value;
        }
    }

    public function setProperty($key, $value)
    {
        self::$properties[$key] = $value;
    }

    public function getProperties($key)
    {
        if(isset(self::$properties[$key]))
        {
            return self::$properties[$key];
        }
        return null;
    }

    public function getProperty()
    {
        return self::$properties;
    }


    public function __set($name, $object)
    {
        if(!isset(self::$objects[$name]))
        {
            self::$objects[$name] = new $object;
        }
    }

    public function __get($name)
    {
        if(is_object(self::$objects[$name]))
        {
            return self::$objects[$name];
        }
    }

    public function __unset($name)
    {
        if(is_object(self::$objects[$name]))
        {
            self::$objects[$name] = null;
        }
        return;
    }
}