<?php

class Cookie
{
    private $cook = false;

    private function val( $mass ) {
        
        if(!is_array($mass)){
            $mass = [$mass];
        }
        
        foreach($mass as $key => $value){
            if( empty($value) )
            {
                throw new Exception("Пустой параметр");
            }
        }
        

        return true;
    }

    public function set( string $namecookie, $value, int $time = 0 ){
        if($this->val(['cook' => $namecookie, 'value' => $value ])){
            if (!$_COOKIE[$namecookie]){
                setcookie($namecookie, base64_encode(serialize($value)), time() + $time);
            }else{
                $this->del($namecookie);
                setcookie($namecookie, base64_encode(serialize($value)), time() + $time);
            }
        }
    }

    public function get( $namecookie ){

        if($this->val($namecookie)){
            if(array_key_exists($namecookie, $_COOKIE)){
                $this->cook = unserialize(base64_decode($_COOKIE[$namecookie]));    
            }
            else
            {
                throw new Exception("Куки с таким названием не существуют");
            }
        }
        
        return $this->cook;
    }

    public function del( $namecookie ){
        if(array_key_exists($namecookie, $_COOKIE)){
            setcookie($namecookie, '' , time()-1);
        }else
        {
            throw new Exception("Невозможно удалить. Куки с таким названием не существуют");
        }
    }

}