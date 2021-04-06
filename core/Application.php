<?php


namespace Synop_Application\core;


/**
 * Class Application contains the basic methods for the decoder application to work
 * @package Synop_Application\core
 */
class Application
{
    use TSingleton;

    public static $app;

    public function __construct($componetns)
    {
        self::$app = new Container();

        self::$app->onComponent($componetns);
    }
}