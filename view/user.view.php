<?php

use Bosqu\ProjetLinksHandler\Model\Manager\LinksManager;
use Bosqu\ProjetLinksHandler\Model\Manager\UserManager;

if (isset($_SESSION['key']))
{
    $user = new UserManager();
    $user = $user->searchUserById($_SESSION['id']);
    $links = new LinksManager();
    $links = $links->getAllByUserId($_SESSION['id']);
?>
<div class="center">
    <div><a href="/index.php?controller=user&action=logout"><button type="button">Déconnexion</button></a></div>
    <div>Nom prénom:<br><?=$user->getNom() . " " . $user->getPrenom()?></div>
    <div>Email:<br><?=$user->getMail()?></div>
    <div><a href="/index.php?controller=links">Retour</a></div>
</div>
<?php
}