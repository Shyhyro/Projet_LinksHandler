<div id="littleBody">
    <?php

    use Bosqu\ProjetLinksHandler\Model\Manager\LinksManager;

    ?>
    <div id="link-add-form">
        <form>
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
        </form>
    </div>
    <?php
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
    <button id="links-list">Bouton</button>
</div>

<script src="/js/app.js"></script>