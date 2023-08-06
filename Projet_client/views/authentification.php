<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/authentificationn.css">
    <title>Document</title>
</head>
<body>

    <div class="text">Authentification </div>
   <a href="../index.php"><img src="../asset/img/retour.png" class="retour"></a>


    
    <form action="" method="post">

    <img src="../asset/img/utilisateur (2).png" class="user">
    <input type="text"class="id" name="id" placeholder="Entrez votre identifiant">
    <input type="password" class="mdp" name="mdp" placeholder="Entrez votre mot de passe">
    <input type="submit" value="Connexion" class="connexion" name="connexion">
    <img src="../asset/img/cadenas.png" class="cadenas">


    </form>
  
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