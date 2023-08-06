<?php
require_once "trier.php";

  abstract class Personne implements Trier{
    protected $nom;
    protected $prenom;
    protected $email;
    protected $sexe;
    protected $numero_tel;

    public function trie($a){
        
    }


}


?>