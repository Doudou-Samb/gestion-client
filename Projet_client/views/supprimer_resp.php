<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/supprimerr.css">
    <title>Document</title>
</head>
<body>

<div class="body">
    <img src="../asset/img/utilisateur.png" class="user">
    <div class="user1"> 
        <?php
        require_once "../model/admin.php";
        require_once "../bdd/database.php";
        $admin1= new Admin();
        $admin1->afficherClient();
        ?>


    </div>
    <a href="page1_resp.php"><img src="../asset/img/retour.png" class="retour"></a>

    <form action="" method="post">
        <div class="confirmer"><h2>Etes-vous sure de vouloir supprimer ce client</h2></div>
       
        <input type="submit" value="Confirmer" class="bouton" name="confirmer">
    </form>
    <?php
    require_once '../model/responsable.php';
    if(isset($_POST['confirmer'])){
       extract($_POST);
    $admin= new Responsable();
    $admin->supprimer_resp();

    }
    ?>

</div>
<div class="footer"></div>
    
</body>
</html>