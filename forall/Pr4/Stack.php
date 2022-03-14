<?php

class Stack 
{
    private $stack = [];

    public function push($push){
        $this->stack[] = $push;
    }

    public function pop(){
        $str = $this->stack[-1];
        unset($this->stack[-1]);  
        return $str;
    }

    public function getStack(){
        return $this->stack;
    }

    public function reset(){
        unset($this->stack);
    }
}