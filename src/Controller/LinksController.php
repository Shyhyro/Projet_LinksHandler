<?php

namespace Bosqu\ProjetLinksHandler\Controller;

class LinksController extends Controller
{

    public function home()
    {
        $this->render("links.view.php", "Links Page");
    }
}