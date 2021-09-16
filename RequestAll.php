<?php
    require_once 'database.php';
    require_once 'class/Accommodation.php';
    require_once 'class/Upload.php';
    //SQL request using in js when all the checkbox is unchecked 
    $datas = '';
        $req = $log->query("SELECT * FROM `accommodation` INNER JOIN `accommodation_images` ON accommodation.idAccommodation = accommodation_images.idAccommodation INNER JOIN `images` ON accommodation_images.idImage = images.idImage GROUP BY accommodation.idAccommodation");
        
        while($v = $req->fetch(PDO::FETCH_ASSOC)){
            $datas .= '<div>';
            $datas .= '<div class="container">';
            $datas .= ' <img src= "medias/'. $v['nameImage']. '" alt= "'. $v['nameImage']. '"> ';
            $datas .= '</div>';
            $datas .= '<h2>'. $v['nameAccommodation']. '</h2>';
            $datas .= '<p>'. $v['price']. ' €</p>';
            $datas .= '<p>'. $v['type']. '</p>';
            $datas .= '<p>'. $v['adress']. '</p>';
            $datas .= '<button type="button" class="infos" value="' .$v['idAccommodation']. '">Infos</button>';
            $datas .= '</div>';
        }

    echo $datas;