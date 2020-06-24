<?php


namespace App\Contracts;


/**
 * Interface ICriteria
 * @package App\Contracts
 */
interface ICriteria
{
    const SORT_ASECENDING = 1;
    const SORT_DESECENDING = 0;

    /**
     * @param array $hotels
     * @param int $sortType
     * @return array
     */
    public static function meetCriteria(array $hotels, int $sortType = self::SORT_ASECENDING): array;
}
