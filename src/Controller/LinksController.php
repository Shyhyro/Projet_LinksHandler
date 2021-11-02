<?php

namespace Bosqu\ProjetLinksHandler\Controller;

use Bosqu\ProjetLinksHandler\Model\Manager\LinksManager;
use Bosqu\ProjetLinksHandler\Model\Manager\UserManager;

class LinksController extends Controller
{

    public function home()
    {
        if (isset($_SESSION['key']))
        {
            $this->render("links.view.php", "Links");
        }
        else if (isset($_GET['user']))
        {
            $this->render("links.view.php", "Links");
        }
        else
        {
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
                $user = $_SESSION['id'];

                $linkManager = new LinksManager();
                $linkManager = $linkManager->addLink($href, $title, $target, $name, $user);

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

    public function remove()
    {
        if (isset($_SESSION['key']))
        {
            if (isset($_GET['id']))
            {
                $link = strip_tags(trim($_GET['id']));
                $linkManager = new LinksManager();
                $linkManager = $linkManager->removeLink($link);
                if ($linkManager)
                {
                    header("location:/index.php?controller=links&statut=delete");
                }
                else
                {
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