<?php


namespace App;


abstract class A
{
    public function foo(){
        $this->handle();
    }
    public abstract function handle();

}
