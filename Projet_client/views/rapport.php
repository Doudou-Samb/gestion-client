<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/rapportt.css">
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
    <a href="page1.php"><img src="../asset/img/retour.png" class="retour"></a>

    <form action="" method="post">
        <textarea name="rapport" id="" cols="30" rows="10" class="rapport" placeholder="Ecriver votre rapport(500 mots maximum)"></textarea> 
       
        <input type="submit" value="Soumettre" class="bouton" name="soumettre">
    </form>
    <?php
    require_once '../model/admin.php';
    if(isset($_POST['soumettre'])){
       extract($_POST);
    $admin= new Admin();
    $admin->rapport();

    }
    ?>

</div>
<div class="footer"></div>
    
</body>
</html>