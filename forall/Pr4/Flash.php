<?php 


class Flash 
{
    private $sess;

    function __construct($session){
        $this->sess = $session;
    }

    private function val( $name, $value ){
        if( !is_string($name) && empty($value)){
            throw new Exception("Пусто");
        }
        return true;
    }

    public function setMessage( $name, $value ){
       
        if( $this->val($name, $value) ) {
            $this->sess->setSession($name, $value);
        }
    }
    
    public function getMessage( $name ){

        if($this->sess->isSession($name)){
            $mess = $this->sess->getSession($name);
            
            $this->sess->delSession( $name );
        }
        return $mess;
    }
}