<?php

class LoginManager{

    private $_log;


    public function __construct($log) //construct database
    {
        $this->setLog($log);
    }
    


    public function setLog($log)  // setters database
    {
        $this->_log = $log;
    }

    public function login(Admin $login){

        $client = [];
        
        $req= $this->_log->prepare("SELECT * FROM administrator WHERE `nameAdmin` = :nameAdmin");
        $req->bindValue(':nameAdmin', $login->getNameAdmin());
        $req->execute();

        while($v = $req->fetch(PDO::FETCH_ASSOC)){
            $client[] = new Admin($v);
        }
        return $client;
    }
}

