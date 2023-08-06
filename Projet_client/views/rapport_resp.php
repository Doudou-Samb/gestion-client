<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/rapport_resp.css">
    <title>Document</title>
</head>
<body>

<div class="body">
    <img src="../asset/img/utilisateur.png" class="user">
    <div class="user1"> 
        <?php
        require_once "../model/responsable.php";
        require_once "../bdd/database.php";
        $resp1= new Admin();
        $resp1->afficherClient();
        
        ?>


    </div>
    <a href="page1_resp.php"><img src="../asset/img/retour.png" class="retour"></a>

    <form action="" method="post">
        <div class="rapport">
            <?php
            require_once '../bdd/database.php';
            require_once "../model/responsable.php";
            $resp=new Responsable();
            $resp->afficher_rapport();
            ?>

        </div> 
       
       
    </form>
    

</div>
<div class="footer"></div>
    
</body>
</html>