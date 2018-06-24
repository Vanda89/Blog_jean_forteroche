<?php
require(__DIR__.'/../Utils/PageTemplate.php');

class CoreController
{
    
    protected function show(string $title, string $view, array $viewVars=[])
    {
        if (!isset($tpl)) {
            $tpl = new PageTemplate();
            $tpl->PageTitle = $title;
            $tpl->ContentBody = __DIR__.'/../Views/'.$view.'.php';
            $tpl->viewVars=$viewVars;
            require(__DIR__.'/../Views/layout.php');
            exit;
        }
    }
}
