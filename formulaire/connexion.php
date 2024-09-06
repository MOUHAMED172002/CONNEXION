
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    
    <title>Connexion</title>
</head>
<body>

<div class="container">
    <h1>Connexion</h1>
    <div class="form">
        <form action="connexion.php" method="post" autocomplete="off">
            <label for="login">Login</label>
            <input type="text" name="login" id="" autocomplete="off" >
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="" autocomplete="new-password" >
            <input type="submit" value="valider" name="valider" class="valider">
        </form>
        <a href="inscription.php"></a>
    </div>


</div>

    
</body>
</html>
<?php
include 'base.php';


if(isset($_POST['valider'])){
    session_start();
    $login=strip_tags($_POST['login']);
    $pass=md5($_POST['password']);
    $_SESSION['login']=$login;
    $_SESSION['pass']=$pass;

    if(!empty($login) and !empty($pass)){
        $req=$bdd->prepare('SELECT * FROM test WHERE login=:login AND pass=:pass');
        $req->execute(array(':login'=>$login,':pass'=>$pass));
        $nombre=$req->rowCount();
        if($nombre>0){
            header('location:index.php');

        }else{
            echo 'veuillez revoire les information que vous aviez entrer !!';
        }


    }else{
        echo "veuillez renseigner tous les champs!!!";
    }
}





?>