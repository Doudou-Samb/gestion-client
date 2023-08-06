<?php
require_once 'admin.php';

class Responsable extends Admin{
    protected $mdp;
    protected $id;


//methode ajouter admin

public function ajouter_admin(){
    global $connect;
    //verifier si l utilisateur a appuye sur s inscrire
        extract($_POST);
        if(!empty($id) && !empty($mdp)){
                 //  verifie si l admin existe dans la base de données
                 $clientExist = $connect->prepare('SELECT id,mdp FROM administrateur where id = ? AND mdp=?');
                 $clientExist -> execute([$id,$mdp]);
                 if($clientExist->rowCount()== 0) {
                                  //  ajoute le client dans la base
                                    $q = $connect->prepare('INSERT INTO administrateur(id,mdp)VALUES(?,?)');
                                    $q->execute([$id,$mdp]);
                                    header('Location:ajout_admin_reussi.php');

                               }else{
                                $e = "Cet admin existe deja.";
                               echo $e; 
                       }
                   
               
           
                }else{
                   $e = "Veuillez Remplir tous les champs .";
                   echo $e;
               }
}


//methode pour afficher un rappport

public function afficher_rapport(){

    
    global $connect;

    $client_nom = $_GET['nom'];
    $client_sexe = $_GET['sexe'];
    $client_numero = $_GET['numero_tel'];
    $client_statut = $_GET['statut'];
    $client_email = $_GET['email'];
    $client_adresse = $_GET['adresse'];
  

     $exist=$connect->prepare("SELECT rapport from client where nom=? and sexe=? and numero_tel=? and statut=? and email=? and adresse=?");
    $exist->execute([$client_nom,$client_sexe,$client_numero,$client_statut,$client_email,$client_adresse]);
    $res=$exist->fetchAll();
     if(!empty($res)){

    foreach ($res as $row) {
 //affiche les client en prenant l url de chaque client

       ?><div> <?php echo $row['rapport'];?></div><?php

        }
     }else{
        echo "Aucun Rapport n'a ete soumise";
     }
}


public function supprimer_resp(){
   
    global $connect;
    extract($_POST);

    $client_nom = $_GET['nom'];
    $client_sexe = $_GET['sexe'];
    $client_numero = $_GET['numero_tel'];
    $client_statut = $_GET['statut'];
    $client_email = $_GET['email'];
    $client_adresse = $_GET['adresse'];

        //on verifie si les donnees entres existe dans la base de donne 
        
            $supprimer=$connect->prepare('DELETE FROM client WHERE nom=? and sexe=? and numero_tel=? and statut=? and email=? and adresse=?');
            $supprimer->execute([$client_nom,$client_sexe,$client_numero,$client_statut,$client_email,$client_adresse]);
            header('Location:supprimer_resp_reussie.php');
            exit;
}



public function ajouter_resp(){
   require_once '../bdd/database.php';
    global $connect;
    //verifier si l utilisateur a appuye sur s inscrire
        extract($_POST);
        if(!empty($nom) && !empty($sexe) && !empty($numero) && !empty($email) && !empty($statut) && !empty($adresse)){
                 //  verifie si le client existe dans la base de données
                 $clientExist = $connect->prepare('SELECT nom,sexe,numero_tel,email,statut,adresse FROM client where nom = ? AND sexe=? AND numero_tel=? AND email=? AND statut=? AND adresse=?');
                 $clientExist -> execute([$nom,$sexe,$numero,$email,$statut,$adresse]);
                 if($clientExist->rowCount() == 0) {
                                  //  ajoute le client dans la base
                                    $q = $connect->prepare('INSERT INTO client(nom,sexe,numero_tel,email,statut,adresse)VALUES(?,?,?,?,?,?)');
                                    $q->execute([$nom,$sexe,$numero,$email,$statut,$adresse]);
                                    header('Location:ajout_resp_reussie.php');

                               }else{
                                $e = "Ce client existe deja.";
                               echo $e; 
                       }
                   
               
           
                }else{
                   $e = "Veuillez Remplir tous les champs .";
                   echo $e;
               }
}
        

public function modifier_resp(){
    global $connect;
        $client_nom = $_GET['nom'];
        $client_sexe = $_GET['sexe'];
        $client_numero = $_GET['numero_tel'];
        $client_statut = $_GET['statut'];
        $client_email = $_GET['email'];
        $client_adresse = $_GET['adresse'];

    //verifier si l utilisateur a appuye sur s inscrire
   
        extract($_POST);
        if(!empty($nom) && !empty($sexe) && !empty($numero) && !empty($email) && !empty($statut) && !empty($adresse)){
                 //  verifie si l identidfiant existe dans la base de données
                 
                
                            
                                  //  ajoute le dans la base
                                  $q = $connect->prepare("UPDATE client SET nom=?, sexe=?, numero_tel=?, email=?, statut=?, adresse=? WHERE nom=? AND sexe=? AND numero_tel=? AND email=? AND statut=? AND adresse=?");
                                  $q->execute([$nom, $sexe, $numero, $email, $statut,$adresse ,$client_nom, $client_sexe, $client_numero, $client_email, $client_statut,$client_adresse]);
                                  
                                
                              
                                    header('Location:modifier_resp_reussie.php');

                               }else{
                                $e = "Veuillez Remplir tous les champs .";
                                echo $e;
        }
}


public function list_client_resp(){
        
    global $connect;
     $exist=$connect->prepare("SELECT nom,sexe,numero_tel,statut,email,adresse from client");
    $exist->execute();
    $res=$exist->fetchAll();
     if(!empty($res)){
        ?><tr> <th>Nom</th> <th>Sexe</th> <th>Numero telephone</th> <th class="statut1">Statut</th><th>Email</th><th>Adresse</th> </tr><?php

    foreach ($res as $row) {
  //affiche les client en prenant l url de chaque client
    ?> <tr> <td><img src="../asset/img/utilisateur.png" class="utilisateur" ></td> <td class="nom1"><?php echo $row['nom']?></td> <td class="sexe"><?php echo $row['sexe']?></td> <td class="numero"><?php echo $row['numero_tel']?></td>  <td><?php  echo $row['statut']?></td><td><?php echo $row['email']?></td><td class="adresse"><?php echo $row['adresse']?></td><td><a href="modifier_resp.php?nom=<?php echo $row['nom'];?>&sexe=<?php echo $row['sexe']; ?>&numero_tel=<?php echo $row['numero_tel']; ?>&statut=<?php echo $row['statut']; ?>&email=<?php echo $row['email'];?>&adresse=<?php echo $row['adresse']?>"><img src="../asset/img/bouton-modifier.png" class="modifier"></a> </td>    <td ><a href="rapport_resp.php?nom=<?php echo $row['nom'];?>&sexe=<?php echo $row['sexe']; ?>&numero_tel=<?php echo $row['numero_tel']; ?>&statut=<?php echo $row['statut']; ?>&email=<?php echo $row['email'];?>&adresse=<?php echo $row['adresse']?>"><img src="../asset/img/rapport.png" class="rapport"></a></td> <td><a href="supprimer_resp.php?nom=<?php echo $row['nom'];?>&sexe=<?php echo $row['sexe']; ?>&numero_tel=<?php echo $row['numero_tel']; ?>&statut=<?php echo $row['statut']; ?>&email=<?php echo $row['email'];?>&adresse=<?php echo $row['adresse']?>"><img src="../asset/img/supprimer.png" class="supprimer" ></td> </tr></a></td><?php

        }
     }
}


//methode pour convertir en pdf


   




}
    
