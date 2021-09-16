<?php
    class Upload extends Accommodation{

        protected $_idImage;
        protected $_nameImage;
        protected $_sizeImage;
        protected $_typeImage;


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

        public function getIdImage(){return $this->_idImage;}

        public function getNameImage(){return $this->_nameImage;}

        public function getSizeImage(){return $this->_sizeImage;}

        public function getTypeImage(){return $this->_typeImage;}



        public function setIdimage(int $idImage){
            if(!is_int($idImage)){
                trigger_error('L\'id n\'est pas un entier');
                return;
            }
            $this->_idImage = $idImage;
        }
    
        public function setNameImage($nameImage){return $this->_nameImage = $nameImage;}
    
        public function setSizeImage($sizeImage){return $this->_sizeImage = $sizeImage;}
    
        public function setTypeImage($typeImage){return $this->_typeImage = $typeImage;}
    }
