<?php

class DisponibilityManager{

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
     * insertDispo
     * insert the date and the custumer information from the booking form
     * @param  mixed $insertDispo
     * @return void
     */
    public function insertDispo(Disponibility $insertDispo)
    {
        $req = $this->_log->prepare("INSERT INTO `disponibility`(`enterDate`, `exitDate`, `pax`, `nameUser`, `mail`, `idAccommodation`) VALUES (:enterDate, :exitDate, :pax, :nameUser, :mail, :idAccommodation)");
        $req->bindValue(':enterDate', $insertDispo->getEnterDate());
        $req->bindValue(':exitDate', $insertDispo->getExitDate());
        $req->bindValue(':pax', $insertDispo->getPax());
        $req->bindValue(':nameUser', $insertDispo->getNameUser());
        $req->bindValue(':mail', $insertDispo->getMail());
        $req->bindValue(':idAccommodation', $insertDispo->getIdAccommodation());
        $req->execute();
    }
    
    /**
     * dispoList
     * List all the accommodation with an arrival and departure date, and number of beds clause
     * @param  mixed $listDispo
     * @return void
     */
    public function dispoList(Disponibility $listDispo){ 
        
        $client = [];

        $req = $this->_log->prepare("SELECT `idAccommodation`, `nameAccommodation`, `sleeping`, `adress`, `price`, `type`, `enterDate`, `exitDate` FROM `accommodation` NATURAL JOIN `disponibility` WHERE (:enterDate NOT BETWEEN `enterDate` AND `exitDate`) AND (:exitDate NOT BETWEEN `enterDate` AND `exitDate`) AND `sleeping` = :sleeping GROUP BY `idAccommodation`");
        $req->bindValue(':enterDate', $listDispo->getEnterDate());
        $req->bindValue(':exitDate', $listDispo->getExitDate());
        $req->bindValue(':sleeping', $listDispo->getSleeping());
        $req->execute();
        
        while($v = $req->fetch(PDO::FETCH_ASSOC)){
            $client[] = new Disponibility($v);
            
        }
        return $client;
        
    }
    
    /**
     * status
     *  Show if the accommodation is free or occuped in the admin table 
     * @param  mixed $stat
     * @return void
     */
    public function status($stat)
    {

        $req = $this->_log->prepare("SELECT CASE WHEN `enterDate` < CURRENT_DATE AND `exitDate` > CURRENT_DATE THEN 'Occupé' ELSE 'Libre' END AS `status` FROM `disponibility` WHERE `idAccommodation` = :idAccommodation");
        $req->bindValue(':idAccommodation', $stat->getIdAccommodation());
        $req->execute();
        
        return $req->fetch(PDO::FETCH_ASSOC);
    }

}
