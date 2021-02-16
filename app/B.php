<?php


namespace App;


class B extends A
{
    public function handle()
    {
        dd("FROM B");
    }


    public function fooB()
    {

        dd("Foo BBBBB");
    }

}
