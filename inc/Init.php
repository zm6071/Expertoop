<?php

namespace Inc;

final class Init
{
    public static function get_services()
    {
        return [
//          Inc\pages\Admin::class,
            Pages\Admin::class,
            Base\Enqueue::class
        ];
    }

    private  static function instantiate($class){
       return new $class;
//        $service = new $class;
//        return $service;
    }
    public static function register_services()
    {
        foreach (self::get_services() as $class)
        {
//            $class =
            $service= self:: instantiate($class);
            $service->register();
        }
    }
}