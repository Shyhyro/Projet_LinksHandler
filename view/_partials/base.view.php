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
        if (isset($_SESSION['key']))
        {
        ?>
            <div id="newLink">
                <a href="/index.php?controller=links&action=newlink"><i class="fas fa-plus-square"></i> Ajouter un lien</a>
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