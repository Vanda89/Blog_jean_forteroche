<?php
require_once(__DIR__.'/./CoreController.php');

class MainController extends CoreController
{
    public function showHomeGuest()
    {
        // if (!isset($tpl)) {
        //     $tpl = new PageTemplate();
        //     $tpl->PageTitle = "My Title";
        //     $tpl->ContentBody = __DIR__.'/../Views/homeGuest.php';
        //     require(__DIR__.'/../Views/layout.php');
        //     exit;
        // }
        $this->show('Blog', 'homeGuest');
    }

    public function showPost($id)
    {
        $this->show('Billet', 'postGuest');
    }
}
