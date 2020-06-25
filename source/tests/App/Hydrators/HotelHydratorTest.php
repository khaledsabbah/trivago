<?php


namespace Tests\Unit\App\Hydrators;


use App\Contracts\IHydrate;
use App\Entities\Hotel;
use App\Entities\Room;
use App\Hydrators\HotelHydrator;
use Tests\MockData\HotelsMockData;
use Tests\TestCase;

class HotelHydratorTest extends TestCase
{

    public function testHotelHydrate()
    {
        foreach ($this->hotels as $hotel) {
            $hotelHydrator = $this->prepareHole($hotel);
            $this->assertIsObject($hotelHydrator);
            $this->assertInstanceOf(Hotel::class, $hotelHydrator);
            $this->assertEquals($hotel['name'], $hotelHydrator->getHotelName());
            $this->assertEquals($hotel['stars'], $hotelHydrator->getStars());
            $this->assertEquals(count($hotel['rooms']), count($hotelHydrator->getRooms()));
            $this->assertIsArray($hotelHydrator->getRooms());
            $this->assertIsObject($hotelHydrator->getRooms()[0]);
            $this->assertInstanceOf(Room::class,$hotelHydrator->getRooms()[0]);
        }
    }

}
