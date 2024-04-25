<?php
function calculPrixTTCAbonnementSimple($dureeCommunications, $tarifMinute) {
    $prixHT = $dureeCommunications * $tarifMinute;
    $prixTTC = $prixHT * 1.20; 
    return $prixTTC;}
?>
<?php
function calculPrixTTCAbonnementForfaitaire($dureeCommunications, $forfait) {
    $prixHT = 0;
    $tarifforfait = 0;
    
    switch ($forfait) {
        case 1:
            $tarifforfait = 218;
            break;
        case 2:
            $tarifforfait = 350;
            break;
        case 3:
            $tarifforfait = 450;
            break;
        default:
        $tarifforfait=0;
            break;}
    if ($dureeCommunications > $forfait * 60) {
        $prixHT = ($dureeCommunications - $forfait * 60) * 2; }
    $prixHT += $tarifforfait;
    $prixTTC = $prixHT * 1.20;
    return $prixTTC;}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Calcul du prix TTC</title>
</head>
<body>
    <form method="POST">
    <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br><br>
        <label for="duree">Durée des communications (en minutes) :</label>
        <input type="number" id="duree" name="duree" required><br><br>
        <label for="abonnement">Type d'abonnement :</label>
        <select id="abonnement" name="abonnement" required>
            <option value="1">Abonnement simple</option>
            <option value="2">Abonnement forfait 1 heure</option>
            <option value="3">Abonnement forfait 2 heures</option> 
            <option value="4">Abonnement forfait 3 heures</option>
        </select><br><br>
        <input type="submit" name="submit" value="Calculer">
    </form>
    <?php
    if(isset($_POST['submit'])) {
        $dureeCommunications = $_POST['duree'];
        $abonnement = $_POST['abonnement'];
        $Nom=$_POST['nom'];
        
        if ($abonnement == 1) {
            $prixTTC = calculPrixTTCAbonnementSimple($dureeCommunications, 2);
        } else {
            $prixTTC = calculPrixTTCAbonnementForfaitaire($dureeCommunications, $abonnement - 1);
        }
        
        echo "Prix TTC : " . $prixTTC . "dh";
        echo "Nom : $Nom";
    }
    ?>
</body>
</html>





