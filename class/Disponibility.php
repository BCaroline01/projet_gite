<?php

class Disponibility extends Accommodation{

    protected $_id_disponibility;
    protected $_enterDate;
    protected $_exitDate;
    protected $_pax;
    protected $_nameUser;
    protected $_mail;

 
    public function hydrate(array $elements)
    {
        foreach($elements as $key => $value)
        {
            $method = 'set' . ucfirst($key);
            
            if(method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }


    public function __construct(array $datas)
    {
        if(!empty($datas))
        {
            $this->hydrate($datas);
        }
    }


    public function getIdDisponibility(){return $this->_id_disponibility;}

    public function getEnterDate(){return $this->_enterDate;}

    public function getExitDate(){return $this->_exitDate;}

    public function getPax(){return $this->_pax;}

    public function getNameUser(){return $this->_nameUser;}

    public function getMail(){return $this->_mail;}

    //SETTERS////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    public function setIdDisponibility(int $id_disponibility){
        if(!is_int($id_disponibility)){
            trigger_error('L\'id n\'est pas un entier');
            return;
        }
        $this->id_disponibility = $id_disponibility;
    }

    public function setEnterDate($enterDate){return $this->_enterDate = $enterDate;}

    public function setExitDate($exitDate){return $this->_exitDate = $exitDate;}

    public function setPax(int $pax){return $this->_pax = $pax;}

    public function setNameUser($nameUser){return $this->_nameUser = $nameUser;}

    public function setMail($mail){return $this->_mail = $mail;}


    
        

}