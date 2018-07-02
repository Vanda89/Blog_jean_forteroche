<?php

namespace P4blog\Utils;

class PageTemplate
{
    public $PageTitle;
    public $ContentBody;
    public $viewVars;
    public $isConnected;
    public $isAdmin;

    public $basePath;

    /**
     * __construct.
     */
    public function __construct()
    {
        $this->basePath = Config::getConfig('BASE_PATH');
    }
}
