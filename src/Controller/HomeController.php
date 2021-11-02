<?php

namespace Bosqu\ProjetLinksHandler\Controller;

class HomeController extends Controller
{

    public function home()
    {
        if (isset($_SESSION['key']))
        {
            $userId = $_SESSION['id'];
            $this->render("links.view.php", "Links");
        }
        else
        {
            $this->render("home.view.php", "Home");
        }
    }
}