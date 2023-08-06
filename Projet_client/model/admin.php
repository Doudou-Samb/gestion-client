<?php
require_once "../bdd/database.php";
global $connect;


class Admin  {

    private $id;
    private $mdp;
    
 

//methode login admin et responsable
public function login(){
    global $connect;
    extract($_POST);
    if(!empty($id) && !empty($mdp)){
        $idExist = $connect->prepare('SELECT * FROM administrateur WHERE id=? and mdp=?');
        $idExist->execute([$id, $mdp]);
        $resultat= $idExist->fetch();
        if($resultat==false){
            $mdpExist = $connect->prepare('SELECT * FROM responsable WHERE id=? and mdp=?');
            $mdpExist->execute([$id,$mdp]);
            $resultat2= $mdpExist->fetch();
            if($resultat2==true){
               header('Location:choix.php');
               exit;

            }else{
                echo "Identifiant ou mot de passe incorrecte";
            }
        }else{
            header('Location:page1.php');
            exit;
        }
    }else{
        echo 'veuillez remplir tous les champs';
    }
}

//methode filtre les clients

public function filtre(){
    
    global $connect;
    extract($_POST);
    if(!empty($filtre)){
        ?><tr> <th>Nom</th> <th>sexe</th> <th>Numero telephone</th> <th class="statut1">Statut</th><th>Email</th><th>adresse</th> </tr><?php
     //
        $exist=$connect->prepare("SELECT * from client where nom LIKE ? ");
        $exist->execute(["%$filtre%"]);
        $res=$exist->fetchAll();
        if(empty($res)){
            $exist2=$connect->prepare("SELECT * from client where  adresse LIKE ? ");
            $exist2->execute(["%$filtre%"]);
            $res2=$exist2->fetchAll();
            if(empty($res2)){
                $exist3=$connect->prepare("SELECT * from client where  numero_tel LIKE ? ");
                $exist3->execute(["%$filtre%"]);
                $res3=$exist3->fetchAll();
                if(empty($res3)){
                    echo "Aucune correspondance";
                }else{
                    foreach($res3 as $row){

                        ?> <tr> <td><img src="../asset/img/utilisateur.png" class="utilisateur" ></td> <td class="nom1"><?php echo $row['nom']?></td> <td class="sexe"><?php echo $row['sexe']?></td> <td class="numero"><?php echo $row['numero_tel']?></td>  <td><?php  echo $row['statut']?></td><td><?php echo $row['email']?></td><td class="adresse"><?php echo $row['adresse']?></td>  <td><a href="modifier.php?nom=<?php echo $row['nom'];?>&sexe=<?php echo $row['sexe']; ?>&numero_tel=<?php echo $row['numero_tel']; ?>&statut=<?php echo $row['statut']; ?>&email=<?php echo $row['email'];?>&adresse=<?php echo $row['adresse']?>"><img src="../asset/img/bouton-modifier.png" class="modifier"></a> </td>  <td ><a href="rapport.php"><img src="../asset/img/rapport.png" class="rapport"></a></td> <td><img src="../asset/img/supprimer.png" class="supprimer"></td> </tr><?php

                    }

                }
            }else{
                foreach($res2 as $row){

                    ?> <tr> <td><img src="../asset/img/utilisateur.png" class="utilisateur" ></td> <td class="nom1"><?php echo $row['nom']?></td> <td class="sexe"><?php echo $row['sexe']?></td> <td class="numero"><?php echo $row['numero_tel']?></td>  <td><?php  echo $row['statut']?></td><td><?php echo $row['email']?></td><td class="adresse"><?php echo $row['adresse']?></td>  <td><a href="modifier.php?nom=<?php echo $row['nom'];?>&sexe=<?php echo $row['sexe']; ?>&numero_tel=<?php echo $row['numero_tel']; ?>&statut=<?php echo $row['statut']; ?>&email=<?php echo $row['email'];?>&adresse=<?php echo $row['adresse']?>"><img src="../asset/img/bouton-modifier.png" class="modifier"></a> </td>  <td ><a href="rapport.php"><img src="../asset/img/rapport.png" class="rapport"></a></td> <td><img src="../asset/img/supprimer.png" class="supprimer"></td> </tr><?php


                 }
            }


        }else{
            foreach($res as $row){

                ?> <tr> <td><img src="../asset/img/utilisateur.png" class="utilisateur" ></td> <td class="nom1"><?php echo $row['nom']?></td> <td class="sexe"><?php echo $row['sexe']?></td> <td class="numero"><?php echo $row['numero_tel']?></td>  <td><?php  echo $row['statut']?></td><td><?php echo $row['email']?></td><td class="adresse"><?php echo $row['adresse']?></td>  <td><a href="modifier.php?nom=<?php echo $row['nom'];?>&sexe=<?php echo $row['sexe']; ?>&numero_tel=<?php echo $row['numero_tel']; ?>&statut=<?php echo $row['statut']; ?>&email=<?php echo $row['email'];?>&adresse=<?php echo $row['adresse']?>"><img src="../asset/img/bouton-modifier.png" class="modifier"></a> </td>  <td ><a href="rapport.php"><img src="../asset/img/rapport.png" class="rapport"></a></td> <td><img src="../asset/img/supprimer.png" class="supprimer"></td> </tr><?php


                }
             }
        }else{
            echo "veuillez ecricre qu'elque chose";
        
        }
}
    

 //methode pour afficher la liste des clients

public function list_client(){
        
        global $connect;
         $exist=$connect->prepare("SELECT nom,sexe,numero_tel,statut,email,adresse from client");
        $exist->execute();
        $res=$exist->fetchAll();
         if(!empty($res)){
            ?><tr> <th>Nom</th> <th>Sexe</th> <th>Numero telephone</th> <th class="statut1">Statut</th><th>Email</th><th>Adresse</th> </tr><?php

        foreach ($res as $row) {
    //affiche les client en prenant l url de chaque client
        ?> <tr> <td><img src="../asset/img/utilisateur.png" class="utilisateur" ></td> <td class="nom1"><?php echo $row['nom']?></td> <td class="sexe"><?php echo $row['sexe']?></td> <td class="numero"><?php echo $row['numero_tel']?></td>  <td><?php  echo $row['statut']?></td><td><?php echo $row['email']?></td><td class="adresse"><?php echo $row['adresse']?></td><td><a href="modifier.php?nom=<?php echo $row['nom'];?>&sexe=<?php echo $row['sexe']; ?>&numero_tel=<?php echo $row['numero_tel']; ?>&statut=<?php echo $row['statut']; ?>&email=<?php echo $row['email'];?>&adresse=<?php echo $row['adresse']?>"><img src="../asset/img/bouton-modifier.png" class="modifier"></a> </td>    <td ><a href="rapport.php?nom=<?php echo $row['nom'];?>&sexe=<?php echo $row['sexe']; ?>&numero_tel=<?php echo $row['numero_tel']; ?>&statut=<?php echo $row['statut']; ?>&email=<?php echo $row['email'];?>&adresse=<?php echo $row['adresse']?>"><img src="../asset/img/rapport.png" class="rapport"></a></td> <td><a href="supprimer.php?nom=<?php echo $row['nom'];?>&sexe=<?php echo $row['sexe']; ?>&numero_tel=<?php echo $row['numero_tel']; ?>&statut=<?php echo $row['statut']; ?>&email=<?php echo $row['email'];?>&adresse=<?php echo $row['adresse']?>"><img src="../asset/img/supprimer.png" class="supprimer" ></td> </tr></a></td><?php

            }
         }
}


//methode pour supprimer un client
public function supprimer(){
   
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
            header('Location:supp_reussie.php');
}
        
    
//methode de trie par nom

public function trieNom(){
    
    global $connect;
     $exist=$connect->prepare("SELECT nom from client");
    $exist->execute();
    $res=$exist->fetchAll();
     if(!empty($res)){
        ?><tr> <th>Nom</th> <th>Sexe</th> <th>Numero telephone</th> <th class="statut1">Statut</th><th>Email</th> <th>Adresse</th></tr><?php        
        foreach($res as $row){
            ?> <tr> <td><img src="../asset/img/utilisateur.png" class="utilisateur" ></td> <td><?php echo $row['nom']?></td> <td><?php echo '****'?></td> <td class="numero"><?php  echo "****"?></td>  <td><?php  echo '****' ?></td><td><?php  echo '****'?></td><td><?php  echo '****'?></td>  </tr><?php

        }


    }
}

//methode de trie par adresse
public function trieAdresse(){
  
    global $connect;
     $exist=$connect->prepare("SELECT adresse from client");
    $exist->execute();
    $res=$exist->fetchAll();
     if(!empty($res)){
        ?><tr> <th>Nom</th> <th>Sexe</th> <th>Numero telephone</th> <th class="statut1">Statut</th><th>Email</th><th>adresse</th> </tr><?php        
        foreach($res as $row){
            ?> <tr> <td><img src="../asset/img/utilisateur.png" class="utilisateur" ></td> <td><?php echo '****'?></td> <td><?php echo '****'?></td> <td class="numero"><?php  echo "****"?></td>  <td><?php  echo '****' ?></td><td><?php  echo '****'?></td><td><?php  echo $row['adresse']?></td>  </tr><?php

        }


    }
}

//methode de trie par numero telephone

public function trieNumero(){
   
    global $connect;
     $exist=$connect->prepare("SELECT numero_tel from client");
    $exist->execute();
    $res=$exist->fetchAll();
     if(!empty($res)){
        ?><tr> <th>Nom</th> <th>Sexe</th> <th>Numero telephone</th> <th class="statut1">Statut</th><th>Email</th> <th>Adresse</th></tr><?php        
        foreach($res as $row){
            ?> <tr> <td><img src="../asset/img/utilisateur.png" class="utilisateur" ></td> <td><?php echo '****'?></td> <td><?php echo '****'?></td> <td class="numero"><?php  echo $row['numero_tel']?></td>  <td><?php  echo '****' ?></td><td><?php  echo '****'?></td><td><?php  echo '****'?></td>  </tr><?php

        }


    }   
}


//methode de trie par statut

public function trieStatut(){
   
    global $connect;
     $exist=$connect->prepare("SELECT statut from client");
    $exist->execute();
    $res=$exist->fetchAll();
     if(!empty($res)){
        ?><tr> <th>Nom</th> <th>Sexe</th> <th>Numero telephone</th> <th class="statut1">Statut</th><th>Email</th> <th>Adresse</th></tr><?php        
        foreach($res as $row){
            ?> <tr> <td><img src="../asset/img/utilisateur.png" class="utilisateur" ></td> <td><?php echo '****'?></td> <td class="sexe"><?php echo '****'?></td> <td class="numero"><?php  echo "****"?></td>  <td><?php  echo $row['statut'] ?></td><td><?php  echo '****'?></td><td><?php  echo '****'?></td>  </tr><?php

        }


    }
}

//methode ajouter client

public function ajouter(){
    
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
                                     header('Location:ajout_reussie.php');

                                }else{
                                 $e = "Ce client existe deja.";
                                echo $e; 
                        }
                    
                
            
                 }else{
                    $e = "Veuillez Remplir tous les champs .";
                    echo $e;
                }
}
    
//methode modifier
public function modifier(){
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
                                  
                                
                              
                                    header('Location:modif_reussie.php');

                               }else{
                                $e = "Veuillez Remplir tous les champs .";
                                echo $e;
        }
}
       
   
//methode logout

public function logout(){
   
        // Détruire la session en cours (assurez-vous que la session a été démarrée)
        session_start();
        session_destroy();

        // Rediriger vers la page de connexion après la déconnexion
        header("Location: authentification.php");
        exit; // Assurez-vous de quitter le script après la redirection
}


//methode qui permet d afficher les donnees du client que l on veut modifier les donnees
public function afficherClient(){
    global $connect;

    // Vérifier si l'ID du client est passé en paramètre d'URL
    if (isset($_GET['nom']) && !empty($_GET['nom']) &&($_GET['sexe']) && !empty($_GET['sexe'])&&($_GET['numero_tel']) && !empty($_GET['numero_tel'])&&($_GET['statut']) && !empty($_GET['statut'])&&($_GET['email']) && !empty($_GET['email'])&& ($_GET['adresse']) && !empty($_GET['adresse'])) {
     // Récupérer l'ID du client depuis l'URL
        $client_nom = $_GET['nom'];
        $client_sexe = $_GET['sexe'];
        $client_numero = $_GET['numero_tel'];
        $client_statut = $_GET['statut'];
        $client_email = $_GET['email'];
        $client_adresse = $_GET['adresse'];

    // Requête pour récupérer les données du client avec cet ID
    $query = $connect->prepare("SELECT * FROM client WHERE nom = ? AND sexe = ? AND numero_tel = ? AND statut = ? AND email = ? AND adresse= ?");
    $query->execute([$client_nom,$client_sexe,$client_numero,$client_statut,$client_email,$client_adresse]);
    $client = $query->fetch(PDO::FETCH_ASSOC);
    IF(!empty($client)){
        ?>

        
        <table>
            <tr> <td class="nom1"><h3><?php echo $client['nom']?></h3></td> <td class="sexe1"><h3><?php  echo $client['sexe']?><h3></td>  <td class="numero1"><h3><?php echo $client['numero_tel']?></h3></td> <td class="statut"><h3><?php  echo $client['statut']?></h3></td><td class="email1"><h3><?php echo $client['email']?></h3></td> <td class="adresse1"><h3><?php echo $client['adresse']?></h3></td></tr>
        </table>
    <?php
    }

  
    }
}

//methode pour la creation de rapport
public function rapport(){
   
    global $connect;
   extract($_POST);
   $client_nom = $_GET['nom'];
   $client_sexe = $_GET['sexe'];
   $client_numero = $_GET['numero_tel'];
   $client_statut = $_GET['statut'];
   $client_email = $_GET['email'];
   $client_adresse = $_GET['adresse'];


    if(!empty($rapport)){
        $exist=$connect->prepare('SELECT rapport from client');
        $exist->execute([$rapport]);
        $p=$exist->rowcount();
        if(empty($p)){
            $q = $connect->prepare('UPDATE client SET rapport = ? WHERE nom = ? AND sexe = ? AND numero_tel = ? AND statut = ? AND email = ? AND adresse = ?');
            $q->execute([$rapport,$client_nom,$client_sexe,$client_numero,$client_statut,$client_email,$client_adresse]);
            header('Location:rapport_soumis.php');
            exit;
        }else{
            echo 'un rapport sur ce client a deja ete soumis';
        }

        

    }else{
        echo 'Ce rapport est vide';
    
    }
}











}