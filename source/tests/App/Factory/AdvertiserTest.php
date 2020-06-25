<?php


namespace Tests\Unit\App\Factory;


use App\Contracts\IAdvertiser;
use App\Factory\AbstractAdvertiserFactory;
use Tests\TestCase;

class AdvertiserTest extends TestCase
{
    private $advertisers;

    public function setUp(): void
    {
        parent::setUp();
        $this->advertisers=['airbnb','booking'];
    }
    public function testInstantiate()
    {
        foreach ($this->advertisers as $advertiser){
            $obj= AbstractAdvertiserFactory::Instantiate($advertiser);
            $this->assertInstanceOf(IAdvertiser::class, $obj);
            $this->assertObjectHasAttribute('hotelKeys', $obj);
            $this->assertObjectHasAttribute('roomKeys', $obj);
            $this->assertIsObject($obj);
            $this->assertClassNotHasStaticAttribute('API_URL', get_class($obj));
        }
    }
}
