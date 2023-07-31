

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
    <link rel="stylesheet" href="Assets/Css/style3.css">
</head>
    
<body>
    <nav>
        <ul class="menu-item">
            <li><a href="Views/gestiondespatients.php" target="popup" onclick="window.open('Views/gestiondespatients.php', 'popup', 'width=800,height=600'); return false;">
                <img src="Assets/Images/OIP.jpg" alt=""><p>Médecins</p></a></li>
            <li><a href="Views/Gestiondesfactures.php" target="popup" onclick="window.open('Views/gestiondesfactures.php', 'popup', 'width=800,height=600'); return false;">
                <img src="Assets/Images/OIP (1).jpg" alt="Facturation"><p>Administrateur</p></a></li>
            <li><a href="Views/prisedeRv.php" target="popup" onclick="window.open('Views/prisedeRv.php', 'popup', 'width=800,height=600'); return false;">
                <img src="Assets/Images/OIP (7).jpg" alt="Rendez-vous"><p>Patient</p></a></li>
            <?php
                if (false) {
                    echo '<li><a href="Views/Gestiondesutilisateurs.php" target="blank">
                    <img src="Assets/Images/OIP (2).jpg" alt=""><p>Admnistrateur</p></a></li>';
                } 
            ?>
            <li><a href="View/gestiondesrappels.php" target="popup" onclick="window.open('Views/gestiondesrappels.php', 'popup', 'width=800,height=600'); return false;">
                <img src="Assets/Images/OIP (2).jpg" alt=""><p>Secrétaire</p></a></li>
        </ul>
    </nav>
    <h1 class="container">BIENVENUE A SEN_SANTE</h1>
    <p class="contener">UNE PLATEFORME DE GESTION HOSPITALIERE: CAS DALAL JAMM </P>
        <div class="contener">
            <div class="image-contener">
                <img class="image" src="Assets/Images/image.jfif" alt="">
                <p class="text">Nos Médecins</p>
            </div>
            <div class="image-contener">
                <img class="image" src="Assets/Images/OIP.jfif" alt="">
                <p class="text">Prise de rendez-vous </p>
            </div>
            <div class="image-contener">
                <img class="image" src="Assets/Images/OIP (1).jfif" alt="">
                <p class="text">Nos Patients et Visiteurs</p>
            </div>
            <div class="image-contener">
                <img class="image" src="Assets/Images/th.jfif" alt="">
                <p class="text">Nos Factures</p>
            </div>
        </div>

        <script>
        
        var image = document.getElementsByClassName("image");
        var angle = 0;
        var internal = setInterval(rotateImages, 1000);

        function rotateImages() {
            angle += 20;
            for (var i = 0; i < image.length; i++) {
                images[i].style.transform = "rotate(" + angle + "deg)";
            }  
         }
     </script>
</body>
</html>

