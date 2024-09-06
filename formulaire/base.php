<?php
try{
    $bdd=new PDO('mysql:host=localhost;dbname=formu','root','');  
}catch(Exception $e){
    die('Erreur:'.$e->getMessage());
}



?>