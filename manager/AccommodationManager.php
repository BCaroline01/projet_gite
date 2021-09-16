<?php

    class AccommodationManager
    {


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
         * add
         * insert into the database an accomodation from the admin form
         * @param  mixed $add
         * @return void
         */
        public function add(Accommodation $add)
        {
            $req = $this->_log->prepare('INSERT INTO `accommodation`(`nameAccommodation`, `description`, `sleeping`, `bathroom`, `adress`, `price`, `type`) VALUES (:nameAccommodation, :description, :sleeping, :bathroom, :adress, :price, :type)');

            $req->bindValue(':nameAccommodation', $add->getNameAccommodation());
            $req->bindValue(':description', $add->getDescription());
            $req->bindValue(':sleeping', $add->getSleeping());
            $req->bindValue(':bathroom', $add->getBathroom());
            $req->bindValue(':adress', $add->getAdress());
            $req->bindValue(':price', $add->getPrice());
            $req->bindValue(':type', $add->getType());
            $req->execute();

            header('Location: admin.php');
        }
        
        
        /**
         * update
         * update an accommodation
         * @param  mixed $update
         * @return void
         */
        public function update(Accommodation $update)  
        {
            
            $req = $this->_log->prepare('UPDATE `accommodation` SET `nameAccommodation`= :nameAccommodation,`description`= :description,`sleeping`= :sleeping,`bathroom`= :bathroom,`adress`= :adress,`price`= :price,`type`= :type WHERE `idAccommodation` = :idAccommodation');

            $req->bindValue(':idAccommodation', $update->getIdAccommodation(), PDO::PARAM_INT);
            $req->bindValue(':nameAccommodation', $update->getNameAccommodation());
            $req->bindValue(':description', $update->getDescription());
            $req->bindValue(':sleeping', $update->getSleeping());
            $req->bindValue(':bathroom', $update->getBathroom());
            $req->bindValue(':adress', $update->getAdress());
            $req->bindValue(':price', $update->getPrice());
            $req->bindValue(':type', $update->getType());
            $req->execute();

            header('Location: admin.php');
        }
        
        
        /**
         * listingAll
         *list all the rows from accommodation table
         * @return void
         */
        public function listingAll()  
        {
            $client = [];

            $req = $this->_log->query('SELECT * FROM `accommodation`');

            while($v = $req->fetch(PDO::FETCH_ASSOC)){
                $client[] = new Accommodation($v);
            }

            return $client;
        }
        
        
        /**
         * delete
         * delete an accommodation
         * @param  mixed $del
         * @return void
         */
        public function delete(Accommodation $del) 
        {
            $req = $this->_log->prepare('DELETE FROM `accommodation`  WHERE `idAccommodation` = :idAccommodation');
            $req->bindValue(':idAccommodation', $del->getIdAccommodation(), PDO::PARAM_INT);
            $req->execute();
            //header('Location: admin.php');
        }
        
        
        /**
         * readList
         * list accommodation where id=id
         * @param  mixed $idAccommodation
         * @return void
         */
        public function readList($idAccommodation) 
        {
            $req = $this->_log->prepare('SELECT * FROM `accommodation` WHERE `idAccommodation` = :idAccommodation');

            $req->bindValue(':idAccommodation', $idAccommodation, PDO::PARAM_INT);
            $req->execute();

            $elements = $req->fetch(PDO::FETCH_ASSOC);

            return new Accommodation($elements);
        }

        // public function pagination(){
            
        //     $req = $this->_log->query('SELECT COUNT(*) AS nbAccommodation FROM `accommodation`');

        //     $result = $req->fetch();
        //     $nbAccom = (int) $result['nbAccommodation'];
        // }

        
    }
