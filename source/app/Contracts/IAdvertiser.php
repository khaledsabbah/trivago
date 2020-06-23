<?php


namespace App\Contracts;


/**
 * Interface IAdvertiser
 * @package App\Contracts
 */
interface IAdvertiser
{
    /**
     * @return mixed
     */
    public function getAdvertiserData();

    /**
     * @return array
     */
    public function mockAdvertiserResponse(): array;
}
