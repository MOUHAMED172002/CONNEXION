

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Inscription</title>
</head>
<body>
    <div class="entete">
        <h1>Inscription</h1>
        <a href="connexion.php">Déja inscrit</a>
    </div>
    <div class="form">
        <form action="inscription.php" method="post" autocomplete="off" >
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="" autocomplete="off"    >
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id=""   >
            <label for="login">Login</label>
            <input type="text" name="login" id=""   >
            <label for="pass">Mot de passe</label>
            <input type="password" name="pass" id="" autocomplete="new-password"   >
            <label for="repass">Confirmation</label>
            <input type="password" name="repass" id=""  >
            <input type="submit" name="valider" value="S'inscrit" class="valider ">
            
        </form>
    </div>

    
</body>
</html>
<?php
try{
    $bdd=new PDO('mysql:host=localhost;dbname=formu','root','');

}catch(Exception $e){
    die('Erreur:'.$e->getMessage());
}

if(isset($_POST['valider'])){
    if(!empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['login']) and !empty($_POST['pass']) and $_POST['pass']==$_POST['repass']){
        
        $recherche=$bdd->prepare('SELECT * FROM test WHERE login=:login');
        $recherche->execute(array(':login'=>$_POST['login']));
        
        $nombre=$recherche->rowCount();
        $recherche->closeCursor();

        if($nombre>0){
            echo 'ce compte existe déjà!!!';
        }else{
            $entrer = $bdd->prepare('INSERT INTO test(nom,prenom,login,pass) VALUES (:nom,:prenom,:login,:pass) ');
            $entrer->execute(array(
            ':nom'=> strip_tags($_POST['nom']),
            ':prenom'=>strip_tags($_POST['prenom']),
            ':login'=>strip_tags($_POST['login']),
            ':pass'=>md5($_POST['pass'])));
            $entrer->closeCursor();

            header('location:connexion.php');



        }

        

    }else echo 'veuiller remplir tous les champs!!!'   ;

}






?>

