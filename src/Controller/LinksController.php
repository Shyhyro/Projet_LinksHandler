<?php

namespace Bosqu\ProjetLinksHandler\Controller;

use Bosqu\ProjetLinksHandler\Model\Manager\LinksManager;

class LinksController extends Controller
{

    public function home()
    {
        if (isset($_SESSION['key']))
        {
            $this->render("links.view.php", "Links");
        }
        else
        {
            header("location:/index.php?error=noSession");
        }
    }

    public function newlink()
    {
        if (isset($_SESSION['key']))
        {
            $this->render("links.new.view.php", "New Link");
        }
        else{
            header("location:/index.php?error=noSession");
        }
    }

    public function add()
    {
        if (isset($_SESSION['key']))
        {
            if (isset($_GET['error'], $_POST['href'], $_POST['title'], $_POST['target'], $_POST['name']) && $_GET['error'] === "0")
            {
                $href = strip_tags(trim($_POST['href']));
                $title = strip_tags(trim($_POST['title']));
                $target = strip_tags(trim($_POST['target']));
                $name = strip_tags(trim($_POST['name']));

                $linkManager = new LinksManager();
                $linkManager = $linkManager->addLink($href, $title, $target, $name);

                if ($linkManager)
                {
                    header("location:/index.php?controller=links&statut=add");
                }
                else{
                    header("location:/index.php?controller=links&error=errorIsComing");
                }
            }
            else
            {
                header("location:/index.php?controller=links&error=dataMissing");
            }
        }
        else
        {
            header("location:/index.php?error=noSession");
        }
    }
}