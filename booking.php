<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style_index.css"> 
</head>
<header class="bookingHeader">
    <div id="logo">
        <img src="medias/logo_projet-gite.png" alt="Logo"/>
    </div>
</header>
<body>
   <?php 
    require_once 'database.php';   
    require_once 'class/Accommodation.php';
    require_once 'manager/AccommodationManager.php';
    require_once 'class/Disponibility.php';
    require_once 'manager/DisponibilityManager.php';
    require_once 'modal.php';


    if(!empty($_POST['mail'])) {    
        $insertion = new Disponibility(array('enterDate'=> $_POST['enterDate'], 'exitDate'=> $_POST['exitDate'],'pax'=> $_POST['pax'], 'nameUser'=> $_POST['nameUser'], 'mail'=> $_POST['mail'], 'idAccommodation'=> $_POST['id']));
        $objet = new DisponibilityManager($log);
        $objet->insertDispo($insertion);
           
        $receiver = $_POST['mail'];
        $name = $_POST['nameUser'];
        $enter = $_POST['enterDate'];
        $exit = $_POST['exitDate'];
        $sender = 'nicolacarlo79@gmail.com';


        $subject = 'confirmation of your reservation';

        $header = "From: $sender" ."\n";
        $header .= 'Content-type: text/html; charset=ISO-8859-1'."\n";
        
       
        //max 580px de large, content column
        $contain = '<table style="width:100% border:0 background-color:#7A4419">';
        $contain .= '<td style="width:580px align:center">'; 
        $contain .= '<img src="medias\logo_projet-gite.png" alt="Logo" style="width:125px height:110px"> <br>';
        $contain .= "Hello, <br><br>  Mr/Mrs $name, we confirm your reservation today for the dates from <strong>$enter</strong> to <strong>$exit</strong>. <br><br>";
        $contain .= 'Reguards, <br><br> KyotoResort <br><br>';
        $contain .= "This is an automatic email, please do not reply to this email address";
        $contain .= '</td>';
        $contain .= '</table>';
        

        mail($receiver, $subject, $contain, $header);
    } 
?> 
<div class="thanks">
<h2>Merci, <?=$name?> !</h2>
<p>Un email de confirmation a été envoyé à l'adresse <?=$receiver?>.</p>
<button><a href="index.php">Revenir sur le site</a></button>
</div>
</body>
</html>
