<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/page1_resp.css">
    
    <title>Document</title>
</head>
<body>
    

    <form action="" method="post">
       
        <input type="text" class="filtre" placeholder="Nom,Numero telephone,Adresse" name="filtre">
        <img src="../asset/img/filtre.png" alt="" class="img">
        <input type="submit" value="Filtrer" name="bouton" class="bouton">
        <input type="submit" value="Liste" name="effacer" class="effacer">
        <input type="submit" value="Deconnexion" name="deconnexion" class="deconnexion">
        <input type="submit" value="imprimer en pdf" name="imprimer" class="imprimer">




       
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
require_once '../model/responsable.php';



if(isset($_POST['bouton'])){
  
    $resp=new Responsable();
    $resp->filtre();


}elseif(isset($_POST['effacer'])){
    $resp=new Responsable();
    $resp->list_client_resp();


}elseif(isset($_POST['nom'])){
    $resp=new Responsable();
    $resp->trieNom();

}elseif(isset($_POST['adresse'])){
    $resp=new Responsable();
    $resp->trieAdresse();
}elseif(isset($_POST['numero_tel'])){
    $resp=new Responsable();
    $resp->trieNumero();
}elseif(isset($_POST['statut'])){
    $resp=new Responsable();
    $resp->trieStatut();
}elseif(isset($_POST['deconnexion'])){
    $resp=new Responsable();
    $resp->logout();
}elseif(isset($_POST['imprimer'])){
    



}else{
    $resp=new Responsable();
    $resp->list_client_resp();
}


    ?>


</table>

<a href="ajouter_resp.php"><input type="button" value="Ajouter Client" class="ajouter"></a>





</div>


  





</body>
</html>