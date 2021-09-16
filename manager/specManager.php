<?php

class SpecManager{

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
     * addSpec
     * insert the specific feature into the database with the id accommodation 
     * @param  mixed $addSpec
     * @return void
     */
    public function addSpec(Spec $addSpec){
        
        $req = $this->_log->prepare("INSERT INTO `specification`(`nameSpec`, `idAccommodation`) VALUES ( :nameSpec, :idAccommodation)");
        $req->bindValue(':nameSpec', $addSpec->getnameSpec());
        $req->bindValue(':idAccommodation', $addSpec->getIdAccommodation());
        $req->execute();

    }
    
    /**
     * readListSpec
     *function to checked the checkbox in the admin form when an accommodation is updated
     * @param  mixed $idAccommodation
     * @return void
     */
    public function readListSpec($idAccommodation)
    {
        $elements =[];
        $req = $this->_log->prepare('SELECT * FROM `specification` WHERE `idAccommodation` = :idAccommodation');

        $req->bindValue(':idAccommodation', $idAccommodation, PDO::PARAM_INT);
        $req->execute();

        while($v = $req->fetch(PDO::FETCH_ASSOC)){
            $elements[] = new Spec($v);
            
        }
        return $elements;
      
    }
      
    /**
     * deleteSpec
     * function to delete the specific feature into the database from an accommodation
     * @param  mixed $delSpec
     * @return void
     */
    public function deleteSpec(Spec $delSpec) 
        {
            $req = $this->_log->prepare('DELETE FROM `specification` WHERE idAccommodation = :idAccommodation');
            $req->bindValue(':idAccommodation', $delSpec->getIdAccommodation(), PDO::PARAM_INT);
            $req->execute();
        }
}