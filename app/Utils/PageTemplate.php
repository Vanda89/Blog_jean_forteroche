<?php
class PageTemplate
{
    public $PageTitle;
    public $ContentBody;
    public $viewVars;

    public $basePath;

    public function __construct()
    {
      $this->basePath = getConfig('BASE_PATH');
    }
}
