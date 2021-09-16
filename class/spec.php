<?php

    class Spec extends Accommodation{

        protected $_idSpec;
        protected $_nameSpec;
        
        
        
        /**
         * hydrate
         *
         * @param  mixed $elements
         * @return void
         */
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

        
        /**
         * __construct
         *
         * @param  mixed $datas
         * @return void
         */
        public function __construct(array $datas)
        {
            if(!empty($datas))
            {
                $this->hydrate($datas);
            }
        }
        
        public function getIdSpec(){return $this->_idSpec;}

        public function getNameSpec(){return $this->_nameSpec;}

        

        public function setIdSpec($idspec){
             $this->_idSpec = $idspec;
        }

        public function setNameSpec($nameSpec){
            $this->_nameSpec = $nameSpec;
        }

          
    public static function arraySpec($array, $value){
        foreach($array as $v){
            if($v->getNameSpec() == $value){
                return true;
            }
        }
    }



    }