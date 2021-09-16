<?php

    class Accommodation {

        protected $id_accommodation;
        protected $name_accommodation;
        protected $_description;
        protected $_sleeping;
        protected $_bathroom;
        protected $_adress;
        protected $_price;
        protected $_type;
        


        
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


        public function getIdAccommodation(){return $this->id_accommodation;}

        public function getNameAccommodation(){return $this->name_accommodation;}

        public function getDescription(){return $this->_description;}

        public function getSleeping(){return $this->_sleeping;}

        public function getBathroom(){return $this->_bathroom;}

        public function getAdress(){return $this->_adress;}

        public function getPrice(){return $this->_price;}

        public function getType(){return $this->_type;}



        //SETTERS////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        
        public function setIdAccommodation(int $id_accommodation){
            if(!is_int($id_accommodation)){
                trigger_error('L\'id n\'est pas un entier');
                return;
            }
            $this->id_accommodation = $id_accommodation;
        }

        public function setNameAccommodation($name_accommodation){
            $this->name_accommodation = $name_accommodation;
        }

        public function setDescription($description){
            $this->_description = $description;
        }

        public function setSleeping(int $sleeping){
            if(!is_int($sleeping)){
                trigger_error('Le nombre de couchage n\'est pas un entier');
                return;
            }
            $this->_sleeping = $sleeping;
        }

        public function setBathroom(int $bathroom){
            if(!is_int($bathroom)){
                trigger_error('Le nombre de sdb n\'est pas un entier');
                return;
            }
            $this->_bathroom = $bathroom;
        }

        public function setAdress($adress){
            $this->_adress =$adress;
        }

        public function setPrice(float $price){
            if(!is_float($price)){
                trigger_error('Le prix n\'est pas un décimal');
                return;
            }
            if($price <= 0){
                trigger_error('Le prix n\'est pas négatif');
                return;
            }
            $this->_price =$price;
        }

        public function setType(string $type){
            if(!is_string($type)){
                trigger_error('Le type n\'est pas une chaîne de caractère');
                return;
            }
            $this->_type = $type;
        }


    }