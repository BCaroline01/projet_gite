<?php
    session_start(); 
    // check if a user is logged-in 
    if(empty($_SESSION['login'])) {
        header("location:login.php");
        exit;
    }   
    // Session Destroy on Log Out Button
    if(isset($_GET['deconnexion'])){  
            $_SESSION = array();
            unset($_SESSION); 
            unset($_COOKIE);
            session_destroy();
            header("location:login.php");
            exit;
    }        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_admin.css"> 
    <title>Admin</title>
</head>
<header>
    <nav>
        <ul>
            <li><a href="?deconnexion">Déconnexion</a></li>     
        </ul>
    </nav>
</header>
<?php
    require_once 'database.php';
    require_once 'class/Accommodation.php';
    require_once 'manager/AccommodationManager.php';
    require_once 'manager/UploadManager.php';
    require_once 'class/Upload.php';
    require_once 'class/spec.php';
    require_once 'manager/specManager.php';
    require_once 'manager/DisponibilityManager.php';
    require_once 'class/Disponibility.php';
?>
<body>

<table>
    <tbody>
        <tr class='header'>
            <td>ID</td>
            <td>Nom</td>
            <td>Description</td>
            <td>Couchages</td>
            <td>Salles de bain</td>
            <td>Adresse</td>
            <td>Prix</td>
            <td>Type</td>
            <td>Statut</td>
            <td>Modifier</td>
            <td>Supprimer</td>
        </tr>
        <?php
            // $accommodationPage = 5;
            // $pages = ceil($nbAccom / $accommodationPage);
            // $first = ($currentPage * $accommodationPage) - $accommodationPage;
            
            // List all the rows from the accommodation table 
            $objet = new AccommodationManager($log);
            $list = $objet->listingAll();
            foreach($list as $element) :
        ?>
        <tr class='body'>
            <td><?=$element->getIdAccommodation();?></td>
            <td><?=$element->getNameAccommodation();?></td>
            <td class="text-align_justify"><?=$element->getDescription();?></td>
            <td><?=$element->getSleeping();?></td>
            <td><?=$element->getBathroom();?></td>
            <td><?=$element->getAdress();?></td>
            <td><?=$element->getPrice();?></td>
            <td><?=$element->getType();?></td>
            <td>
            <?php
                // function to add the status in the table  
                $stats = new Disponibility(array('idAccommodation' => $element->getIdAccommodation()));
                $status = new DisponibilityManager($log);
                $free = $status->status($stats);
                if(empty($free)){
                    echo 'Libre';
                }else{
                    foreach($free as $data){
                        echo $data;
                    }
                }
            ?>
            </td>
            <td><a href="admin.php?id=<?=$element->getIdAccommodation();?>"><img src="medias/icon-edit.png" alt="Modifier" id="icon-edit"><a></a></td>
            <td><a href="admin.php?idDel=<?=$element->getIdAccommodation();?>"><img src="medias/icon-delete.png" alt="Delete" id="icon-delete"><a></a></td>
        </tr>
        <?php
            endforeach;
        ?>
     </tbody>    
</table>

<?php 
    if(isset($_POST['submit'])){
        if(isset($_POST['id'])){
            // Insert the update data into the database from the form
            $edit = new Accommodation(array('idAccommodation' => $_GET['id'], 'nameAccommodation'=> $_POST['name'], 'description'=> $_POST['description'],'sleeping'=> $_POST['sleeping'], 'bathroom'=> $_POST['bathroom'], 'adress'=> $_POST['adress'], 'price'=> $_POST['price'], 'type'=> $_POST['type']));
            $objet = new AccommodationManager($log);
            $objet->update($edit);

        }elseif(isset($_POST['name'])){
            // Insert data into the database from the form
            $insert = new Accommodation(array('nameAccommodation'=> $_POST['name'], 'description'=> $_POST['description'],'sleeping'=> $_POST['sleeping'], 'bathroom'=> $_POST['bathroom'], 'adress'=> $_POST['adress'], 'price'=> $_POST['price'], 'type'=> $_POST['type']));
            $objet = new AccommodationManager($log);
            $objet->add($insert);
            $lastIdAccommodation = $log->lastInsertId();
            // Upload Image into Database from the form
            $array =[];
            $file = new UploadManager($log);
            for($i = 0; $i < count($_FILES['photo']['name']); $i++){
            $insertFile = new Upload(array('nameImage' => $_FILES['photo']['name'][$i], 'sizeImage' => $_FILES['photo']['size'][$i],'typeImage' => $_FILES['photo']['type'][$i]));
            $file->insertFile($insertFile);
            $array[] = $log->lastInsertId();
            }  
            // Insert the last id accommodation into the table accommodation_images
            foreach($array as $value){
                $insertId = new Upload(array('idAccommodation' => $lastIdAccommodation, 'idImage' => $value));
                $file->insertId($insertId);
            }
            // Insert the checkbox values into the database
            foreach($_POST['spec'] as $specification){
                $addSpec = new Spec(array('nameSpec' => $specification, 'idAccommodation' => $lastIdAccommodation));
                $obj = new SpecManager($log);
                $obj->addSpec($addSpec);
            }

            $nb = count($_FILES["photo"]["name"]);
            for($i = 0; $i < $nb; $i++){
                if(isset($_FILES["photo"]) && $_FILES["photo"]["error"][$i] == 0){
                    $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                    $filename = basename($_FILES["photo"]['name'][$i]); 
                    $filesize = $_FILES["photo"]["size"][$i];
                    $filetype = $_FILES["photo"]["type"][$i];
                        
                    // check the extension 
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    if(!array_key_exists($ext, $allowed)) {
                        echo "Erreur : Veuillez sélectionner un format de fichier valide.";
                    }
                   
                    // check the MIME type
                    if(in_array($filetype, $allowed)){
                    // check if thhe file already exist
                    if(file_exists("medias/" . $_FILES["photo"]["name"][$i])){
                        echo $filename . " existe déjà.";
                    } else{
                        move_uploaded_file($_FILES["photo"]["tmp_name"][$i], "medias/" . $_FILES["photo"]["name"][$i]);
                    } 
                    } else{
                        echo "Erreur: Il y a eu un problème de téléchargement de votre" .$filename. "Veuillez réessayer.";
                        }
                }else{
                    echo "Error : " . $_FILES["photo"]["error"][$i];
                    }
            }
            
        }
    }
?>
<form method="post" enctype="multipart/form-data">

    <?php
        if(isset($_GET['id'])) :
            $list = $objet->readList($_GET['id']);
    ?>
    <div>
        <input type="hidden" name="id" value="<?=$_GET['id'];?>">
    </div>
    <?php
        endif;
    ?>
    <div>
        <label for="name">Nom de l'hebergement :</label>
        <input type="text" id="name" name="name" required value="<?php if (isset($_GET['id'])){echo $list->getNameAccommodation()  ?? '';}?>">
    </div>
    <div>
        <label for="description">Description :</label>
        <textarea id="description" name="description" cols="50" rows="10" >
        <?php if (isset($_GET['id'])){echo $list->getDescription()  ?? '';}?>
        </textarea>
    </div>
    <div>
        <label for="photo">Image :</label>
        <input type="file" name="photo[]" id="photo" accept=".jpg, .jpeg, .gif, .png">
    </div>
    <div>
        <input type="button" id="btnAdd" value="ajouter une image" onclick="add(i)">
        <script>
            var i=0;
            function add(i){
                i++;
                var inputFile = document.createElement("input");
                inputFile.type = 'file';
                inputFile.name = 'photo[]';
                inputFile.id = 'ImageUpload';
                inputFile.accept='.jpg, .jpeg, .gif, .png'; 
                document.getElementById('addDiv').prepend(inputFile); 
            };
        </script>
    </div>
    <div>
        <label for="sleeping">Nombre de couchages:</label>
        <input type="number" id="sleeping" name="sleeping" min="1" value="<?php if (isset($_GET['id'])){echo $list->getSleeping()  ?? '';}?>">
    </div>
    <div>
        <label for="bathroom">Nombre de salles de bain:</label>
        <input type="number" id="bathroom" name="bathroom" min="1" value="<?php if (isset($_GET['id'])){echo $list->getBathroom()  ?? '';}?>">
    </div>
    <div>
        <label for="adress">Adresse:</label>
        <input type="text" id="adress" name="adress" value="<?php if (isset($_GET['id'])){echo $list->getAdress()  ?? '';}?>" required>
    </div>
    <div>
        <label for="price">Prix:</label>
        <input type="number" id="price" name="price" min="1" value="<?php if (isset($_GET['id'])){echo $list->getPrice()  ?? '';}?>"step="0.01" required>
    </div>
    <div>
        <select name="type" value="<?php if (isset($_GET['id'])){echo $list->getType() ?? '';}?>">
            <option value="House"<?php if (isset($_GET['id'])){echo ($list->getType()  == 'House' )? "selected" : "" ;}?>>House</option>
            <option value="Apartment"<?php if (isset($_GET['id'])){echo ($list->getType()  == 'Apartment' )? "selected" : "" ;}?>>Apartment</option>
            <option value="Homestay"<?php if (isset($_GET['id'])){echo ($list->getType()  == 'Homestay' )? "selected" : "" ;}?>>Homestay</option>
            <option value="Ryokan"<?php if (isset($_GET['id'])){echo ($list->getType()  == 'Ryokan' )? "selected" : "" ;}?>>Ryokan</option>
        </select>
        <?php
        if(isset($_GET['id'])){
            
            $obj = new SpecManager($log);
            $listSpec = $obj->readListSpec($_GET['id']);
            
        }
        ?>
        <div>
            <input type="checkbox" id="garden" name="spec[]" value="garden" <?= (isset($_GET['id']) && Spec::arraySpec($listSpec,'garden')) ? "checked" : "" ; ?>>
            <label for="garden">Jardin</label>
        </div>
        <div>
            <input type="checkbox" id="parking" name="spec[]" value="parking" <?= (isset($_GET['id']) && Spec::arraySpec($listSpec,'parking')) ? "checked" : "" ; ?>>
            <label for="parking">Parking</label>
        </div>
        <div>
            <input type="checkbox" id="publicBath" name="spec[]" value="publicBath" <?= (isset($_GET['id']) && Spec::arraySpec($listSpec,'publicBath')) ? "checked" : "" ; ?>>
            <label for="publicBath">Bain public</label>
        </div>
        <div>
            <input type="checkbox" id="hotTub" name="spec[]" value="hotTub" <?= (isset($_GET['id']) && Spec::arraySpec($listSpec,'hotTub')) ? "checked" : "" ; ?>>
            <label for="hotTub">Jacuzzi</label>
        </div>
        <div>
            <input type="checkbox"  id="laundry" name="spec[]" value="laundry" <?= (isset($_GET['id']) && Spec::arraySpec($listSpec,'laundry')) ? "checked" : "" ; ?>>
            <label for="laundry">Laverie</label>
        </div>
        <div>
            <input type="checkbox"  id="familyRoom" name="spec[]" value="familyRoom" <?= (isset($_GET['id']) && Spec::arraySpec($listSpec,'familyRoom')) ? "checked" : "" ; ?>>
            <label for="familyRoom">Chambres familiales</label>
        </div>
        <div>
            <input type="checkbox" id="balcony" name="spec[]" value="balcony" <?= (isset($_GET['id']) && Spec::arraySpec($listSpec,'balcony')) ? "checked" : "" ; ?>>
            <label for="balcony">Terrasse / Balcon</label>
        </div>
        <div>
            <input type="checkbox" id="television" name="spec[]" value="television" <?= (isset($_GET['id']) && Spec::arraySpec($listSpec,'television')) ? "checked" : "" ; ?>>
            <label for="television">Télévision</label>
        </div>
        <div>
            <input type="checkbox" id="bedding" name="spec[]" value="bedding" <?= (isset($_GET['id']) && Spec::arraySpec($listSpec,'bedding')) ? "checked" : "" ; ?>>
            <label for="bedding">Linge de maison fournis</label>
        </div>
    </div>

        <input type="submit" value="Valider" name="submit" id="submit">

    </form>
    <?php
        if(isset($_GET['idDel'])){
            $delImg = new Upload(array('idAccommodation' => $_GET['idDel']));
            $obj = new UploadManager($log);
            $obj->deleteImg($delImg);

            $delSpec = new Spec(array('idAccommodation' => $_GET['idDel']));
            $manager = new SpecManager($log);
            $manager->deleteSpec($delSpec);

            $del = new Accommodation(array('idAccommodation' => $_GET['idDel']));
            $objet = new AccommodationManager($log);
            $objet->delete($del);
            
            
        }
    ?>
</body>
</html>