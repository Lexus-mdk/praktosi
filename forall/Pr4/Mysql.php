<?php 

class MySql extends mysqli
{

    private $connect = false;

    function __construct($db){

        parent::__construct($db['host'],$db['user'],$db['pass'],$db['dbname']);
        
        if( $this->connect_error ){
            throw new Exception('Нет подключения: ' . $this->connect_errno. ' -> ' . $this->connect_error);
        } 

        $this->connect = true;
    }
    
    public function connected(){
        return $this->connect;
    }
}
