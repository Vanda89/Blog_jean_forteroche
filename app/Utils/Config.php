<?php

namespace P4blog\Utils;

abstract class Config
{
    /**
     * getConfig.
     *
     * @param string $param
     */
    public static function getConfig(string $param)
    {
        $config = parse_ini_file(__DIR__.'/../config.conf');
        if (array_key_exists($param, $config)) {
            return $config[$param];
        }

        return false;
    }
}
