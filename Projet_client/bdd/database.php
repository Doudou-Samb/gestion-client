<?php
$dbhost = 'mysql-gestion-client.alwaysdata.net';
$dbname = 'gestion-client_bdd';
$dbuser = '323106_test';
$dbpswd = 'projet123';


try{
    $connect = new PDO('mysql:host='.$dbhost.';dbname='.$dbname,$dbuser,$dbpswd,
    array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        )

    );
    
}catch (PDOException $e){
    die("Une erreur ".$e->getMessage());
}
?>