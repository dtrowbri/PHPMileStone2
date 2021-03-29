<?php


    class CreditCard
    {
        
        private $id;
        private $Name_On_Card;
        private $Credit_Card_Number;
        private $Expiration_Date;
        private $ccv;
        private $user_id;
        
        public function __construct(?string $name, ?string $credit_card_number, ?string $exp_date, ?string $ccv, ?int $user_id){
            $this->Name_On_Card = $name;
            $this->Credit_Card_Number = $credit_card_number;
            $this->Expiration_Date = $exp_date;
            $this->ccv = $ccv;
            $this->user_id = $user_id;
        }
        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }
    
        /**
         * @return string
         */
        public function getName_On_Card()
        {
            return $this->Name_On_Card;
        }
    
        /**
         * @return string
         */
        public function getCredit_Card_Number()
        {
            return $this->Credit_Card_Number;
        }
    
        /**
         * @return string
         */
        public function getExpiration_Date()
        {
            return $this->Expiration_Date;
        }
    
        /**
         * @return string
         */
        public function getCcv()
        {
            return $this->ccv;
        }
    
        /**
         * @return int
         */
        public function getUser_id()
        {
            return $this->user_id;
        }
    
        /**
         * @param mixed $id
         */
        public function setId($id)
        {
            $this->id = $id;
        }
    
        /**
         * @param string $Name_On_Card
         */
        public function setName_On_Card($Name_On_Card)
        {
            $this->Name_On_Card = $Name_On_Card;
        }
    
        /**
         * @param string $Credit_Card_Number
         */
        public function setCredit_Card_Number($Credit_Card_Number)
        {
            $this->Credit_Card_Number = $Credit_Card_Number;
        }
    
        /**
         * @param string $Expiration_Date
         */
        public function setExpiration_Date($Expiration_Date)
        {
            $this->Expiration_Date = $Expiration_Date;
        }
    
        /**
         * @param string $ccv
         */
        public function setCcv($ccv)
        {
            $this->ccv = $ccv;
        }
    
        /**
         * @param int $user_id
         */
        public function setUser_id($user_id)
        {
            $this->user_id = $user_id;
        }        
    }

?>