<?php

namespace P4blog\Controllers;

use P4blog\Utils\User;
use P4blog\Utils\PageTemplate;
use P4blog\Utils\Config;

class CoreController
{
    /**
     * Méthode générique appelant une View  en lui passant un titre et des variables communes à toutes les Views.
     *
     * @param string $title
     * @param string $view
     * @param mixed array
     */
    protected function show(string $view, string $title, array $viewVars = [])
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
     * Méthode permettant d'afficher une réponse JSON après une requête Ajax.
     *
     * @param mixed $data
     */
    protected static function sendJson($data)
    {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    /**
     * Méthode permettant de faire une redirection en PHP.
     *
     * @param string $url
     */
    protected function redirect(string $url)
    {
        header('Location: '.Config::getConfig('BASE_PATH').$url);
        exit;
    }
}
