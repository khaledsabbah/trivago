<?php

namespace App\Contracts;


/**
 * Interface IHydrate
 * @package App\Contracts
 */
interface IHydrate
{
    /**
     * @param array $data
     * @param array|null $keys
     * @return mixed
     */
    public static function hydrate (Array $data, array $keys=null);

}
