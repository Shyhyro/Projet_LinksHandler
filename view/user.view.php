<?php

use Bosqu\ProjetLinksHandler\Model\Manager\LinksManager;
use Bosqu\ProjetLinksHandler\Model\Manager\UserManager;

if (isset($_SESSION['key']))
{
    $user = new UserManager();
    $user = $user->searchUserById($_SESSION['id']);
    $links = new LinksManager();
    $links = $links->getAll();
?>
<div class="center">
    <div><a href="/index.php?controller=user&action=logout"><button type="button">Déconnexion</button></a></div>
    <div>Nom prénom:<br><?=$user->getNom() . " " . $user->getPrenom()?></div>
    <div>Email:<br><?=$user->getMail()?></div>
    <table>
        <tr>
            <th>Lien</th>
            <th>Href</th>
            <th>Titre</th>
            <th>Nom</th>
            <th>Actions</th>
        </tr>
        <?php
        foreach ($links as $link)
        {
        ?>
            <tr>
                <td><?=$link->getId()?></td>
                <td><?=$link->getHref()?></td>
                <td><?=$link->getTitle()?></td>
                <td><?=$link->getName()?></td>
                <td><a href="/index.php?controller=links&action=remove&id=<?=$link->getId()?>">Supprimer</a></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div><a href="/index.php?controller=links">Retour</a></div>
</div>
<?php
}