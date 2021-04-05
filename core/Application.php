<?php


namespace Synop_Application\core;


class Application
{
    use TSingltone;

    public static $app;

    public function __construct($componetns)
    {
        self::$app = new Container();

        self::$app->onComponent($componetns);
    }
}