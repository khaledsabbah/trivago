<?php

namespace App\Contracts;


interface IHydrate
{
    public static function hydrate (Array $data, array $keys=null);

}
