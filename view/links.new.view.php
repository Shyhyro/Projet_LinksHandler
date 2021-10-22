<div id="littleBody">
    <div id="registration">
        <form name="newLink" method="post" action="/index.php?error=0&controller=links&action=add">
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
    <a href="/index.php?controller=links">Retour</a>
</div>