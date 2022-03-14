<?php

class Form
{

    private function isArray($form){
        
        if( !is_array($form) ){
            throw new Exception("Переданые параметры не является массивом");
        }
        return true;

    }
    
    private function parametr($attributes = []){
        $param = '';
        if( !empty($attributes) && $this->isArray($attributes) ){
            foreach ($attributes as $key => $val){
                $param .= $key . "='{$val}' ";
            }
        }
        return $param;
    }

    public static function Begin( $attributes ){
        $form = new self();
        $param = "<form ". $form->parametr($attributes) ." >\n";  
        echo $param;      
        return $form;
    }

    public function input ( $attributes ){
        $this->isArray($attributes);
        
        $param = "<div>\n   ";
        $param .= "<input ". $this->parametr($attributes) ." />\n";
        $param .= "</div>\n";        
    
        return $param;
    } 
    
    public function submit ($attributes = []){

        $this->isArray($attributes);

        $attributes['type'] = 'submit';

        return $this->input($attributes);
    }

    public function password ($attributes = []){
        
        if( $this->isArray($attributes) ){
            $attributes['type'] = 'password';
        }

        return $this->input($attributes);
    }

    public function textarea ($attributes){

        if( $this->isArray($attributes) ){
            if( array_key_exists('value', $attributes) ){
                unset($attributes['value']);
            }
        }

        $param = "<div>\n   ";
        $param .= "<textarea " . $this->parametr($attributes) . "></textarea>\n";
        return $param .= "</div>\n";
    }
    
    public static function end(){
        echo "</form>\n";
    }
}