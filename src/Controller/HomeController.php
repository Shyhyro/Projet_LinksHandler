<?php

namespace Bosqu\ProjetLinksHandler\Controller;

class HomeController extends Controller
{

    public function home()
    {
        $this->render("home.view.php", "Home");
    }
}