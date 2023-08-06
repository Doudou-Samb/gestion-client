<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/pag1.css">
    
    <title>Document</title>
</head>
<body>
    

    <form action="" method="post">
       
        <input type="text" class="filtre" placeholder="Nom,Numero telephone,Adresse" name="filtre">
        <img src="../asset/img/filtre.png" alt="" class="img">
        <input type="submit" value="Filtrer" name="bouton" class="bouton">
        <input type="submit" value="Liste" name="effacer" class="effacer">
        <input type="submit" value="Deconnexion" name="deconnexion" class="deconnexion">



       
</form>
<form action="" method="post">
<div class="trie">
<input type="submit" value="Nom" class="nom" name="nom">
<input type="submit" value="adresse" class="adresse1" name="adresse">
<input type="submit" value="Numero telephone" class="numero_telephone" name="numero_tel">
<input type="submit" value="Statut" class="Statut" name="statut">

</div>
</form>

<div class="liste">
<table>
  
  



<?php
require_once '../model/admin.php';


if(isset($_POST['bouton'])){
  
    $admin=new Admin();
    $admin->filtre();


}elseif(isset($_POST['effacer'])){
    $admin=new Admin();
    $admin->list_client();


}elseif(isset($_POST['nom'])){
    $admin=new Admin();
    $admin->trieNom();

}elseif(isset($_POST['adresse'])){
    $admin=new Admin();
    $admin->trieAdresse();
}elseif(isset($_POST['numero_tel'])){
    $admin=new Admin();
    $admin->trieNumero();
}elseif(isset($_POST['statut'])){
    $admin=new Admin();
    $admin->trieStatut();
}elseif(isset($_POST['deconnexion'])){
    $admin=new Admin();
    $admin->logout();
}else{
    $admin=new Admin();
    $admin->list_client();
}


    ?>


</table>

<a href="ajouter.php"><input type="button" value="Ajouter Client" class="ajouter"></a>





</div>


  





</body>
</html>