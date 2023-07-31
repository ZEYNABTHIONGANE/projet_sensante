<?php
    session_start();
    $db = new PDO('mysql:host=localhost;dbname=sensante', 'root', '');
    if(isset($_POST['envoyer'])){
        if(!empty($_POST['email']) AND !empty($_POST['mdp'])){
            $email = htmlspecialchars($_POST['email']);
            $mdp = sha1($_POST['mdp']);

            $recupUser = $db->prepare('select * from users where email=? AND mdp = ?');  
            $recupUser->execute(array($email ,$mdp));

            if ($recupUser->rowCount() > 0){
                $_SESSION['email']=$email;
                $_SESSION['mdp']=$mdp;
                $_SESSION['idUtilisateur']=$recupUser->fetch()['idUtilisateur'];
            }else{
                echo "votre identifiant ou mot de passe est incorrect";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../login/css/connexion.css">
    <link rel="stylesheet" href="../assets/css/style1.css">
    <link rel="stylesheet" href="../assets/css/inscription.css">

</head>
<body>
           <!--  debut header -->
           <header>
           <img src="../images/logo.png" alt="">
        <ul class="menu">
            <a href="../index.php">Accueil</a>
            <a href="#">services</a>
            <a href="#">Apropos</a>
            <a href="#">Contact</a>
        </ul>
        <div class="inscription">
       
        </div>
    </header>
     <!-- fin header -->

         <!-- formulaire -->
         <div class="body">
     <div class="container">
        <h1 class="titre">Formulaire de Connexion</h1>
        <form action="rvpatient.php">
            <div class="main-user-infos">
             
                <div class="user-input-box">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" placeholder="Entrer Votre Email">
                </div>
                
                <div class="user-input-box">
                    <label for="mdp">Mot de Passe</label>
                    <input type="password" id="mdp" name="mdp" placeholder="">
                </div>
               
            </div>
            <div class="soumettre">
                <input type="submit" name="envoyer" value="CONNEXION">
            </div>
        </form>
    </div>
     </div>
</body>
</html>