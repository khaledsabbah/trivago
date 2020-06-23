<?php

namespace App\Contracts;


/**
 * Interface IFactory
 *
 * @package App\Contracts
 */
interface IFactory
{
    /**
     * DEFAULT ADVERTISER NAMESPACE
     */
    const ADVERTISER_NAMESPACE ="App\Advertisers\\";

    /**
     * @param string $advertiserName
     * @param string $nameSpace
     * @return mixed
     */
    static function Instantiate(string $advertiserName, string $nameSpace=''):IAdvertiser;
}
