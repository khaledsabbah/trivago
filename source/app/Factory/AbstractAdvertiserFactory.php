<?php

namespace App\Factory;


use App\Contracts\IAdvertiser;
use App\Contracts\IFactory;
use App\Exceptions\AdvertiserNotFoundException;

/**
 * Class AbstractAdvertiserFactory
 *
 * @package App\Factory
 */
abstract class AbstractAdvertiserFactory implements IFactory
{

    /**
     * @param string $advertiserName
     * @param string $nameSpace
     * @return mixed
     * @throws AdvertiserNotFoundException
     */
    static function Instantiate(string $advertiserName, string $nameSpace = ''):IAdvertiser
    {
        // TODO: Implement Instantiate() method.
        $service= self::ADVERTISER_NAMESPACE. ucfirst($advertiserName);
        if( class_exists($service) ){
            return new $service();
        }
        throw  new AdvertiserNotFoundException($advertiserName,"Advertiser" );
    }
}
