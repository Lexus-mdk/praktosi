<?php

class Session
{

    private $sess = false;

    function __construct(){
        session_start();
    }

    private function val( $name ){
        
        if(!is_string($name)){
            throw new Exception('Не получается создать сессию');
        }
        
        return true;
    }

    public function setSession( $name, $text ){
        if($this->val($name)){
            $_SESSION[$name] = $text;
        }
    }
    
    public function getSession($session){

        if($this->val($session)){
            $this->sess = $_SESSION[$session];
        }

        return $this->sess;
    }

    public function delSession($session){
        if($this->val($session)){
            unset($_SESSION[$session]);
        }
    }
    public function isSession($session){
        return $_SESSION[$session] ? true : false;
    }
}