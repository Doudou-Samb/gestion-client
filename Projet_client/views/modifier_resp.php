<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/modifierr.css">
    <title>Document</title>
</head>
<body>


<div class="body">
    <img src="../asset/img/utilisateur.png" class="user">
    <div class="user1"> 
        <?php
        require_once'../model/admin.php';
        require_once'../bdd/database.php';
        $admin1= new Admin();
        $admin1->afficherClient();
?>

    </div>
    <a href="page1_resp.php"><img src="../asset/img/retour.png" class="retour"></a>

    <?php

require_once '../model/responsable.php';
require_once '../bdd/database.php';

if(isset($_POST['modifier'])){
    extract($_POST);
    $admin=new Responsable();
    $admin->modifier_resp();

}
?>

    <form action="" method="post">
        <input type="text" class="nom" placeholder="Entrez un nom" name="nom">
        <input type="text" class="sexe" placeholder="Entrez son sexe(Masculin/Feminin)" name="sexe">
        <input type="number" class="numero" placeholder="Entrez un numero de telephone" name="numero">
        <input type="email" class="email" placeholder="Entrez un email" name="email">
        <input type="text" class="statut1" placeholder="Entrez son statut" name="statut">
        <input type="text" class="adresse" placeholder="Entrez son adresse" name="adresse">

        <input type="submit" value="modifier" class="bouton" name='modifier'>
    </form>



</div>
<div class="footer"></div>

    
</body>
</html>