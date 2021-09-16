<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_index.css"> 
    <title>Accueil</title>
</head>

<?php
    require_once 'database.php';
    require_once 'class/Accommodation.php';
    require_once 'manager/AccommodationManager.php';
    require_once 'class/Disponibility.php';
    require_once 'manager/DisponibilityManager.php';
    require_once 'manager/UploadManager.php';
    require_once 'class/Upload.php';
    require_once 'RequestSpec.php';
?>
<body>
    <header>
        <section class="background_form">
            <div id="logo">
                <img src="medias/logo_projet-gite.png" alt="Logo"/>
            </div>
            <form action="index.php" method="POST" id="form">   
                <div class="input-form">
                    <div class="input">
                        <label for="enterDate">Date d'arrivée</label>
                        <input type="date" name="enterDate" id="enterDate">
                    </div>
                    <div class="input">
                        <label for="exitDate">Date de départ</label>
                        <input type="date" name="exitDate" id="exitDate">
                    </div>
                    <div class="input">
                        <label for="sleeping">Couchages</label>
                        <input type="number" name="sleeping" id="sleeping" min="0" required>
                    </div>
                    <input type="submit" name="submit" id="dispo" value="Disponibilité">
                </div>
            </form>
        </section>
    </header>
    <main>
        <div class="box">
            <fieldset class="border-type">
            <legend class="legend-type_equipment">Types d'hébergements</legend>
                <div>
                    <input type="checkbox" id="house" name="type[]" value="house">
                    <label for="house">Maisons</label>
                </div>
                <div>
                    <input type="checkbox" id="apartment" name="type[]" value="apartment">
                    <label for="apartment">appartements</label>
                </div>
                <div>
                    <input type="checkbox" id="ryokan" name="type[]" value="ryokan">
                    <label for="ryokan">Ryokan</label>
                </div>
                <div>
                    <input type="checkbox" id="homestay" name="type[]" value="homestay">
                    <label for="homestay">Séjours chez l'habitant</label>
                </div>
            </fieldset>
            <div id="equipment">

                <fieldset class="border-equipment">
                    <legend class="legend-type_equipment">Équipements</legend>

                    <div>
                        <input type="checkbox" id="garden" name="spec[]" class ="spec" value="garden">
                        <label for="garden">Jardin</label>
                    </div>

                    <div>
                        <input type="checkbox" id="parking" name="spec[]" class ="spec" value="parking">
                        <label for="parking">Parking</label>
                    </div>

                    <div>
                        <input type="checkbox" id="publicBath" name="spec[]" class ="spec" value="publicBath">
                        <label for="publicBath">Bain public</label>
                    </div>

                    <div>
                        <input type="checkbox" id="hotTub" name="spec[]" class ="spec" value="hotTub">
                        <label for="hotTub">Jacuzzi</label>
                    </div>
                        
                    <div>
                        <input type="checkbox" id="laundry" name="spec[]" class ="spec" value="laundry">
                        <label for="laundry">Laverie</label>
                    </div>
                        
                    <div>
                        <input type="checkbox" id="familyRoom" name="spec[]" class ="spec" value="familyRoom">
                        <label for="familyRoom">Chambres familiales</label>
                    </div>

                    <div>
                        <input type="checkbox" id="balcony" name="spec[]" class ="spec" value="balcony">
                        <label for="balcony">Terrasse / Balcon</label>
                    </div>

                    <div>
                        <input type="checkbox" id="television" name="spec[]" class ="spec" value="television">
                        <label for="television">Télévision</label>
                    </div>

                    <div>
                        <input type="checkbox" id="bedding" name="spec[]" class ="spec" value="bedding">
                        <label for="bedding">Linge de maison fournis</label>
                    </div>

                </fieldset>
            </div>
        </div>

        <section class="accommodation data">

            <?php
            //List with arrival and departure date, and number of beds clause
            if(isset($_POST['submit'])){
                $arrival = $_POST['enterDate'];
                $departure = $_POST['exitDate'];
                $listDispo = new Disponibility(array('enterDate' => $arrival, 'exitDate' => $departure, 'sleeping' => $_POST['sleeping']));
                $list = new DisponibilityManager($log);
                $listWhere = $list->dispoList($listDispo);
                foreach($listWhere as $element) :
            ?>

            <div>
                <div class="container">

                    <?php
                    $img = new Upload (array('idAccommodation' => $element->getIdAccommodation()));
                    $obj = new UploadManager($log);
                    $listImage = $obj->ImageId($img);
                    ?>
                            <img src="<?= 'medias/'. $listImage[0]->getNameImage(); ?>" alt="<?=$listImage[0]->getNameImage(); ?>">
                </div>
                <h2><?=$element->getNameAccommodation();?></h2>
                <p><?=$element->getPrice();?> €</p>
                <p><?=$element->getType();?></p>
                <p><?=$element->getAdress();?></p>
                <button type="button" class="infos" value="<?=$element->getIdAccommodation();?>">Infos</button>
                
            </div>
            
            <?php 
                endforeach;
            }else{
                // List all the rows from the accommodation table  
                $objet = new AccommodationManager($log);
                $list = $objet->listingAll();
                foreach($list as $element) :
                    ?> 

            <div>
            <div class="container">

                <?php
                    $img = new Upload (array('idAccommodation' => $element->getIdAccommodation()));
                    $obj = new UploadManager($log);
                    $listImage = $obj->ImageId($img);  
                ?>

                <img src="<?= 'medias/'. $listImage[0]->getNameImage(); ?>" style="" alt="<?=$listImage[0]->getNameImage(); ?>">
            </div>

            <h2><?=$element->getNameAccommodation();?></h2>
            <p><?=$element->getPrice();?> €</p>
            <p><?=$element->getType();?></p>
            <p><?=$element->getAdress();?></p>
            <button type="button" class="infos" value="<?=$element->getIdAccommodation();?>">Infos</button>
            </div>
            
            <?php
                endforeach;
            }
            ?>

        </section>

    </main>

    <div id="div-footer">
        <footer>&copy; Copyright 2021
             <p>Design by BONY Caroline, CARLO Nicola, BRAHIMI Salahaddine, BLASCO Matisse</p></footer>
    </div>
<script src="main.js"></script>
  
</body>
</html>