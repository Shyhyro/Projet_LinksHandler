<?php
namespace Bosqu\ProjetLinksHandler\Controller;

class Controller
{

    public function render(string $view, string $tittle, array $data = null)
    {
        ob_start();
        require dirname(__FILE__) . "/../../View/$view";
        $html = ob_get_clean();
        require dirname(__FILE__) . "/../../View/_partials/base.view.php";
    }
}