<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$tittle?></title>
    <!-- Styles -->
    <link rel="stylesheet" href="/css/common.css">
    <link rel="icon" href="/document/placeholder.png" >
    <!-- Outils -->
    <script src="https://kit.fontawesome.com/f8e4a7ab95.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
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
            <a href="#" id="link-add-button"><i class="fas fa-plus-circle"></i> Ajouter un lien</a>
        </div>
        <div id="website"><h1>Links Handler</h1></div>
        <div id="account">
            <a href="/index.php?controller=user"><i class="fas fa-user-circle"></i></a>
        </div>
        <div id="link-add-form" class="modal">
            <form>
                <h3>Ajout d'un nouveau lien</h3>
                <hr>
                Href:
                <input name="href" type="url" maxlength="150" required>
                Title:
                <input name="title" type="text" maxlength="50" required>
                Ouvrir dans:
                <select name="target" required>
                    <option value="_blank">une nouvelle fenêtre</option>
                    <option value="_self">fenêtre actuel</option>
                </select>
                Name:
                <input name="name" type="text" maxlength="100" required>
                <button type="submit">Ajouter</button>
                <button type="button" id="back_link">Retour</button>
            </form>
        </div>
        <?php
    }
    else
    {
        echo "<div id='website'><h1>Links Handler</h1></div>";
    }
    ?>
</header>

<div id="container">
    <?=$html?>
</div>

<footer>
    <div>This app is made with a <i class="fas fa-paw"></i> by a Cat!</div>
    <div>
        <a href="mailto:linkshandler@exemple.com?subject=Feedback for linkshandler.com&body=<?=$_SESSION['nom']?>">
            <button type="button">Envoyer un Email</button>
        </a>
    </div>
</footer>
<?php
if (isset($_SESSION['key']))
{
    ?>
    <script src="/js/app.js"></script>
<?php
}
?>

</body>
</html>