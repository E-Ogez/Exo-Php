<?php
session_start();
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
    if (isset($_POST["change"])) {
        $Req = $Base->query("SELECT * FROM test WHERE Nom = '" . $_POST["name"] . "'");
        $test = $Req->fetch();
        if (isset($test["ID"])) {
            if ($_POST["pwd"] == $_POST["pwd2"]) {
                $Base->query("UPDATE test SET MdP = '" . $_POST["pwd"] . "' WHERE ID = '" . $test["ID"] . "'");
                echo "Le mot de passe a été changé";
            } else echo "Mots de passe différents";
        } else echo "Utilisateur inconnu";
    } else {
    ?>
        <form action="" method="post">
            <span>Nom : <input type="text" name="name" id="name" required></span>
            <span>Mdp : <input type="password" name="pwd" id="pwd" required></span>
            <span>Confirmer Mdp: <input type="password" name="pwd2" id="pwd2" required></span>
            <span><input type="submit" value="Connexion" name="change"></span>
        </form>
    <?php } ?>
    <span><a href="index.php">Retour</a></span>
</body>

</html>