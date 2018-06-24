<?php

$config = parse_ini_file(__DIR__.'/../config.conf');

function getConfig(string $param)
{
  global $config;
    if (array_key_exists($param, $config)) {
        return $config[$param];
    }
    return false;
}
