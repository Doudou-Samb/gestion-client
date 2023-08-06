<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/ajout_admin.css">
    <title>Document</title>
</head>
<body>


<div class="body">
    <img src="../asset/img/utilisateur.png" class="user">
    <div class="user1"> 
    <table><tr> <td><h3>Nom</h3></td> <td><h3>Prenom<h3></td>  <td><h3>Numero telephone</h3></td> <td class="statut"><h3>Statut</h3></td> </tr></table>



    </div>
    <a href="choix.php"><img src="../asset/img/retour.png" class="retour"></a>
    <?php
require_once '../model/responsable.php';
require_once "../bdd/database.php";

if(isset($_POST['ajouter'])){
    extract($_POST);
    $admin=new Responsable();
    $admin->ajouter_admin();


}
?>

    <form action="" method="post">
    
        <input type="text" class="id" placeholder="Entrez un identifiant" name="id">
       
        <input type="password" class="mdp" placeholder="Entrez un mdp" name="mdp">

        <input type="submit" value="Ajouter" class="bouton" name='ajouter'>
    </form>



</div>
<div class="footer"></div>

    
</body>
</html>