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
<div id="littleBody"></div>

<script src="/js/app.js"></script>