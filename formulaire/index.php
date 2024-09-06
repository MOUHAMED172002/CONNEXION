<?php
session_start();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=" style2.css">
    <title>Bienvenue</title>
</head>
<body>
    <h1>Bienvenue <?php echo $_SESSION['login'];
    
    ?></h1>
    <a href="deconnexion.php" class="valider">Déconnexion</a>
    
</body>
</html>