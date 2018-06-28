<?php

namespace P4blog\Controllers;

use P4blog\Utils\User;
use P4blog\Utils\PageTemplate;

class CoreController
{
    protected function show(string $title, string $view, array $viewVars = [])
    {
        if (!isset($tpl)) {
            $tpl = new PageTemplate();
            $tpl->PageTitle = $title;
            $tpl->ContentBody = __DIR__.'/../Views/'.$view.'.php';
            $tpl->viewVars = $viewVars;
            $tpl->isConnected = User::isConnected();

            if ($tpl->isConnected !== null) {
                $tpl->isAdmin = User::isAdmin();
            } else {
                $tpl->isAdmin = false;
            }
            require __DIR__.'/../Views/layout.php';
            exit;
        }
    }

    /**
     * redirect.
     *
     * @param string $url
     */
    protected function redirect(string $url)
    {
        header('Location: '.$url);
        exit;
    }
}
