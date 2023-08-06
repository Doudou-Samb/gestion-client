<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/choixx.css">
    <title>Document</title>
</head>
<body>

    <div class="text"> Choix Responsable</div>
   <a href="authentification.php"><img src="../asset/img/retour.png" class="retour"></a>


    
   

   <a href="page1_resp.php">
   <div class="liste"></div>
   <p class="liste2">Liste clients</p>
   </a>
    
   <a href="ajout_admin.php">
   <div class="ajout"></div>
   <p class="ajout2">Ajouter admin</p>
   </a>
  
  
    <?php
    require_once "../model/admin.php";
    

    if(isset($_POST['connexion'])){
        extract($_POST);
      
            $admin=new Admin();
            $admin->login();

    }

    ?>


    
</body>
</html>