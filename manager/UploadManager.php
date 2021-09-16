<?php

Class UploadManager{

    private $_log;


    public function __construct($log) //construct database
    {
        $this->setLog($log);
    }
    


    public function setLog($log)  // setters database
    {
        $this->_log = $log;
    }
    
    /**
     * insertFile
     *upload images into the database
     * @param  mixed $img
     * @return void
     */
    public function insertFile(Upload $img){
        
        $req = $this->_log->prepare("INSERT INTO images(nameImage, sizeImage, typeImage) VALUES(:nameImage, :sizeImage, :typeImage)");
        $req->bindValue(':nameImage', $img->getNameImage());
        $req->bindValue(':sizeImage', $img->getSizeImage());
        $req->bindValue(':typeImage', $img->getTypeImage());
        $req->execute();
    }
    
    
    /**
     * insertId
     * Insert the last id accommodation into the table accommodation_images
     * @param  mixed $lastId
     * @return void
     */
    public function insertId(Upload $lastId){
        $req = $this->_log->prepare("INSERT INTO `accommodation_images`(`idAccommodation`, `idImage`) VALUES (:idAccommodation, :idImage)");
        $req->bindValue(':idAccommodation', $lastId->getIdAccommodation());
        $req->bindValue(':idImage', $lastId->getIdImage());
        $req->execute();
    }
    
    /**
     * ImageId
     * Associate multiple images with the idAccommodation
     * @param  mixed $idImage
     * @return void
     */
    public function ImageId(Upload $idImage){

        $client = [];

        $req = $this->_log->prepare("SELECT * FROM accommodation_images INNER JOIN images ON accommodation_images.idImage = images.idImage WHERE idAccommodation = :idAccommodation");
        $req->bindValue(':idAccommodation', $idImage->getIdAccommodation());
        
        $req->execute();

        while($v = $req->fetch(PDO::FETCH_ASSOC)){
            $client[] = new Upload($v);
            
        }
        return $client;
    }
    
    /**
     * deleteImg
     * Delete images into the database from the admin form
     * @param  mixed $delImage
     * @return void
     */
    public function deleteImg(Upload $delImage) 
        {
            $req = $this->_log->prepare('DELETE `accommodation_images`, `images` FROM  `accommodation_images` INNER JOIN `images` ON accommodation_images.idImage = images.idImage WHERE idAccommodation = :idAccommodation');
            $req->bindValue(':idAccommodation', $delImage->getIdAccommodation(), PDO::PARAM_INT);
            $req->execute();
        }
}