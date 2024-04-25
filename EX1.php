<?php
if ($_SERVER['REQUEST_METHOD']==='POST'||$_SERVER['REQUEST_METHOD']==='GET');
$Nom = isset($_REQUEST['nom'])?$_REQUEST['nom']:'';
$Prenom = isset($_REQUEST['Prenom'])?$_REQUEST['Prenom']:'';
if(!empty($Nom) && !empty($Prenom)){
    echo "Bonjour $Nom $Prenom";
}else {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulaire</title>
    </head>
    <body>
        <form method="POST"action="">
        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom" required>
        <br>
        <label for="Prenom">Prenom:</label>
        <input type="text" name="Prenom" id="Prenom" required>
        <br>
        <input type="submit" name="" id="" value="valider">
        </form>
    </body>
    </html>
    <?php } ?>



