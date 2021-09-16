<?php

    class Admin{

        private $_idAdmin;
        private $_nameAdmin;
        private $_password;




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
    

    public function getIdAdmin(){return $this->_idAdmin;}

    public function getNameAdmin(){return $this->_nameAdmin;}

    public function getPassword(){return $this->_password;}



    public function setIdAdmin(int $idAdmin){
        if(!is_int($idAdmin)){
            trigger_error('L\'id n\'est pas un entier');
            return;
        }
        $this->_idAdmin = $idAdmin;
    }

    public function setNameAdmin($nameAdmin){return $this->_nameAdmin = $nameAdmin;}
    
    public function setPassword($password){return $this->_password = $password;}
}