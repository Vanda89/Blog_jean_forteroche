<?php

namespace P4blog\Utils;

class Config
{
    /**
     * getConfig.
     *
     * @param string $param
     */
    public static function getConfig($param)
    {
        $config = parse_ini_file(__DIR__.'/../config.conf');
        if (array_key_exists($param, $config)) {
            return $config[$param];
        }

        return false;
    }
}
