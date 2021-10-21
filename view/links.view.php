<div id="littleBody">
    <?php

    use Bosqu\ProjetLinksHandler\Model\Manager\LinksManager;

    $linkManager = new LinksManager();

    $allLinks = $linkManager->getAll();

    foreach ($allLinks as $link)
    {
    ?>
        <div class="linkImage">
            <div class="image"><img src="/document/placeholder.png" alt="Placeholder, image temporaire."></div>
            <div class="linkName"><a href="<?=$link->getHref()?>" target="<?=$link->getTarget()?>"><?=$link->getTitle()?></a></div>
        </div>
    <?php
    }
    ?>
</div>