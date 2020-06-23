<?php


namespace App\Contracts;


interface IAdvertiser
{
    public function getAdvertiserData();

    public function mockAdvertiserResponse(): array;
}
