<?php

namespace Bosqu\ProjetLinksHandler\Controller;

use Bosqu\ProjetLinksHandler\Model\Manager\UserManager;

class UserController extends Controller
{

    public function login()
    {
        if (isset($_SESSION['id'], $_SESSION['nom'], $_SESSION['key']))
        {
            header('location:/index.php');
        }
        else
        {
            if (isset($_GET['error'], $_POST['mail'], $_POST['pass']) && $_GET['error'] === "0")
            {
                $mail = strip_tags(trim($_POST['mail']));
                $password = strip_tags(trim($_POST['pass']));

                $user = new UserManager();

                if ($user->searchUser($mail))
                {
                    if (password_verify($password, $user->searchUser($mail)->getPass()))
                    {
                        $_SESSION['id'] = $user->searchUser($mail)->getId();
                        $_SESSION['nom'] = $user->searchUser($mail)->getNom();
                        $_SESSION['key'] = date('dmY') . $user->searchUser($mail)->getId();

                        if (isset($_SESSION['id'], $_SESSION['nom'], $_SESSION['key']))
                        {
                            $userId = $_SESSION['id'];
                            header('location:/index.php?controller=links&statut=online');
                        }
                        else
                        {
                            header('location:/index.php?error=errorIsComing');
                        }
                    }
                    else
                    {
                        header('location:/index.php?error=passwordBad');
                    }
                }
                else
                {
                    header('location:/index.php?error=noUser');
                }
            }
            else
            {
                header('location:/index.php?error=missingData');
            }
        }
    }

    public function add()
    {
        if (isset($_SESSION['key']))
        {
            header('location:/index.php');
        }
        else
        {
            if(isset($_GET['error'], $_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['pass']) && $_GET['error'] === "0")
            {
                $nom = strip_tags(trim($_POST['nom']));
                $prenom = strip_tags(trim($_POST['prenom']));
                $mail = strip_tags(trim($_POST['mail']));
                $pass = strip_tags(trim($_POST['pass']));

                $user = new UserManager();
                $user = $user->searchUser($mail);

                $uppercase = preg_match('@[A-Z]@', $pass);
                $lowercase = preg_match('@[a-z]@', $pass);
                $number = preg_match('@[0-9]@', $pass);
                $specialChars = preg_match('@[^\w]@', $pass);

                if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pass) <= 8)
                {
                    header("location:/index.php?error=easyPassword");
                }
                else
                {
                    if ($user == null)
                    {
                        $new_pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
                        $addUser = new UserManager();
                        $addUser = $addUser->addUser($nom, $prenom, $mail, $new_pass);

                        if ($addUser)
                        {
                            header("location:/index.php?statut=create");
                        }
                        else
                        {
                            header("location:/index.php?error=errorIsComing");
                        }
                    }
                    else
                    {
                        header("location:/index.php?error=userTrue");
                    }
                }
            }
            else
            {
                header("location:/index.php?error=missingData");
            }
        }
    }

    public function logout()
    {
        if(isset($_SESSION['id'], $_SESSION['nom'], $_SESSION['key'])) {
            $_SESSION = array();
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
            session_destroy();
            header("location:/index.php?statut=offline");
        }
        else
        {
            header("location:/index.php?error=noSession");
        }
    }

    public function home()
    {
        $userId = $_SESSION['id'];
        $this->render("user.view.php", "Options");
    }
}