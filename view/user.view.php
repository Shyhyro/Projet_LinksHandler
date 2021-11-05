<?php

use Bosqu\ProjetLinksHandler\Model\Manager\LinksManager;
use Bosqu\ProjetLinksHandler\Model\Manager\UserManager;

if (isset($_SESSION['key']))
{
    $userManager = new UserManager();
    $user = $userManager->searchUserById($_SESSION['id']);
    $linksManager = new LinksManager();
    $links = $linksManager->getAllByUserId($_SESSION['id']);

    $countLinksClick = 0;
    $countLink = 0;
    $allLinks =$linksManager->getAllByUserId($_SESSION['id']);
    foreach ($allLinks as $oneLink) {
        $countLinksClick = $countLinksClick + $oneLink->getClick();
        $countLink = $countLink + 1;
    }
?>
<div class="center">
    <div><a href="/index.php?controller=user&action=logout"><button type="button">Déconnexion</button></a></div>
    <div><i class="fas fa-user"></i>: <?=$user->getNom() . " " . $user->getPrenom()?></div>
    <div><i class="fas fa-at"></i>: <?=$user->getMail()?></div>
    <div><a href="/index.php?controller=links"><button type="button">Retour</button></a></div>
</div>
<?php
    if ($userManager->searchUserById($_SESSION['id'])->getRoleFk() === 1 || 2)
    {
        ?>
        <div>
            <div>Total des clicks: <?=$countLinksClick?></div>
            <div>Total de liens: <?=$countLink?></div>
            <canvas id="myChart" width="400" height="400"></canvas>
        </div>
        <script src="/js/canva.js"></script>
<?php
    }
}