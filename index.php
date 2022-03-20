<?php
session_start();
include "user.php";
try {
    $Base = new PDO('mysql:host=localhost;dbname=User', 'root', 'root');
} catch (Exception $e) {
    echo "La base de données VPS n'a pas été mis à jour";
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="test.css">
    <link rel="icon" type="image/png" sizes="16x16" href="icone.png">
    <title>Exo DS</title>
</head>

<body>
    <?php
    if (isset($_POST["btnConnect"])) {
        $Req = $Base->query("SELECT * FROM test WHERE Nom = '" . $_POST["txtnom"] . "'");
        $test = $Req->fetch();
        if (isset($test["ID"])) {
            $user = new user($test["ID"],$test["Nom"],$test["MdP"]);
            echo "Bienvenue " . $user->getnom();
        } else echo "Utilisateur inconnu";
        ?>
        <span><a href="index.php">Formulaire</a></span>
    <?php
    } else {
        include "formulaire.html";
    }
    ?>
    <p><a href="../../index.html">Retour</a></p>
</body>

</html>