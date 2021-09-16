<?php
   require_once 'database.php';
   require_once 'class/Accommodation.php';
   require_once 'manager/AccommodationManager.php';
   require_once 'class/Disponibility.php';
   require_once 'manager/DisponibilityManager.php';
   require_once 'manager/UploadManager.php';
   require_once 'class/Upload.php';
    

    if(isset($_GET['id'])){
        
        $contentImg = '';

        $selectImg = $log->prepare('SELECT * FROM accommodation_images INNER JOIN images ON accommodation_images.idImage = images.idImage WHERE idAccommodation = :id');
        $selectImg->bindValue(':id', $_GET['id']);
        $selectImg->execute();
        
            $contentImg .= ' <div class="slideshow-container"> ';
        while($img = $selectImg->fetch(PDO::FETCH_ASSOC)){
            $contentImg .= ' <div class="mySlides"> ';
            $contentImg .= ' <img src= "medias/'. $img['nameImage']. '" alt= "'. $img['nameImage']. '"> ';
            $contentImg .= ' </div> ';   
        }
        $contentImg .= '<a class="prev" onclick="plusSlides(-1)">&#10094;</a>';    
        $contentImg .= '<a class="next" onclick="plusSlides(1)">&#10095;</a>';
        $contentImg .= ' </div> ';

        echo $contentImg;

        $select = $log->prepare('SELECT * FROM  `accommodation` WHERE `idAccommodation` = :id');
        $select->bindValue(':id', $_GET['id']);
        $select->execute();


        $content = '';        

        while($v = $select->fetch(PDO::FETCH_ASSOC)){
            $content .= '<form action="booking.php" method="POST">';
            $content .= '<div>';
            $content .= '<label for="enterDate">Date d\'arrivée</label>';
            $content .= '<input type="date" name="enterDate" id="enterDate" placeholder="Date d\'arrivée" required>';
            $content .= '</div>';
            $content .= '<div>';
            $content .= '<label for="exitDate">Date de départ</label>';
            $content .= '<input type="date" name="exitDate" id="exitDate" required>';
            $content .= '</div>';
            $content .= '<input type="number" name="pax" id="pax" min="1" placeholder="Personnes" required>';
            $content .= '<input type="text" name="nameUser" id="nameUser" placeholder="Nom" required>';
            $content .= '<input type="email" name="mail" id="mail" placeholder="Mail" pattern="[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+.[a-zA-Z.]{2,15}" required>';
            $content .= '<input type="hidden" name="id" value="'.$v['idAccommodation'].'">';
            $content .= '<button type="submit">Réserver</button>';
            $content .= '</form>';   

            $content .= ' <div class="accommodationModal"> ';
            $content .= ' <h2>'. $v['nameAccommodation']. '</h2> ';
            $content .= '<div class="firstRow">';
            $content .= ' <p>'. $v['type']. '</p> ';
            $content .= ' <p>Tarif : '. $v['price']. ' €</p> ';
            $content .= '</div>';
            $content .= '<div class="secondRow">';
            $content .= ' <p> Nombre de couchage : '. $v['sleeping']. '</p> ';
            $content .= ' <p>Nombre de salle de bain : '. $v['bathroom']. '</p> ';
            $content .= '</div>';
            $content .= ' <p> Adresse : '. $v['adress']. '</p> ';
            $content .= '<br>';
            $content .= ' <p class="des">'. $v['description']. '</p> ';
            $content .= '<br>';
            $content .= ' <div class="arrival"> ';
            $content .= ' <p> Arrivée : 15h00 </p> ';
            $content .= ' <p> Départ : 11h00 </p> ';
            $content .= ' </div> ';
            $content .= ' </div> ';

  

        }
      
        echo $content;
  }