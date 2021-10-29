<div id="littleBody">
    <div class="registration">
        <form class="littleBorderForm" name="login" method="post" action="index.php?controller=user&action=login&error=0">
            <h2>Connexion</h2>
            Mail:
            <input name="mail" type="email" maxlength="100" required>
            Password:
            <input name="pass" type="password" required>
            <button type="submit">Connexion</button>
        </form>
    </div>
    <div>
        <form class="littleBorderForm" name="registration" method="post" action="index.php?controller=user&action=add&error=0">
            <h2>Enregistrement</h2>
            Nom:
            <input name="nom" type="text" maxlength="40" required>
            Prénom:
            <input name="prenom" maxlength="40" required type="text">
            Email:
            <input type="email" maxlength="100" required name="mail">
            Password:
            <input name="pass" required type="password">
            <button type="submit">Envoyer</button>
        </form>
    </div>
</div>