<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$tittle?></title>
    <!-- Styles -->
    <link rel="stylesheet" href="/css/common.css">
    <!-- Outils -->
    <script src="https://kit.fontawesome.com/f8e4a7ab95.js" crossorigin="anonymous"></script>
</head>
<body>
<div id="container">
    <header>
        <?php
        if (isset($_GET['error']))
        {
            $error = $_GET['error'];

            switch ($error)
            {
                case 'errorIsComing':
                    echo "<div id='message' class='red'>Une erreur est survenu!</div>";
                    break;
                case 'noSession':
                    echo "<div id='message' class='orange'>Aucune session trouver!</div>";
                    break;
                case 'dataMissing':
                    echo "<div id='message' class='orange'>Donnée(s) manquante(s)!</div>";
                    break;
                case 'passwordBad':
                    echo "<div id='message' class='orange'>Utilisateur ou mots de passe incorrect!</div>";
                    break;
                case 'noUser':
                    echo "<div id='message' class='orange'>Aucun utilisateur trouver!</div>";
                    break;
                case 'easyPassword':
                    echo "<div id='message' class='orange'>Mots de passe trop simple!</div>";
                    break;
                case 'userTrue':
                    echo "<div id='message' class='orange'>Utilisateur existant!</div>";
                    break;
            }
        }
        if (isset($_GET['statut']))
        {
            $statut = $_GET['statut'];

            switch ($statut)
            {
                case 'add':
                    echo "<div id='message' class='green'>Object créer!</div>";
                    break;
                case 'delete':
                    echo "<div id='message' class='red'>Object supprimer!</div>";
                    break;
                case 'online':
                    echo "<div id='message' class='green'>Vous êtes en ligne!</div>";
                    break;
                case 'create':
                    echo "<div id='message' class='green'>Compte créer!</div>";
                    break;
                case 'offline':
                    echo "<div id='message' class='red'>Vous êtes hors ligne!</div>";
                    break;
            }
        }
        if (isset($_SESSION['key']))
        {
        ?>
            <div id="newLink">
                <a href="#" id="link-add-button"><i class="fas fa-plus-square"></i> Ajouter un lien</a>
            </div>
            <div><h1>Links Handler</h1></div>
            <div id="account">
                <a href="/index.php?controller=user"><i class="fas fa-portrait"></i></a>
            </div>
        <?php
        }
        else
        {
            echo "<div><h1>Links Handler</h1></div>";
        }
        ?>
    </header>
    <?=$html?>
</div>
</body>
</html>