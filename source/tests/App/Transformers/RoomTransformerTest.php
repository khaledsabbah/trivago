<?php


namespace Tests\Unit\App\Transformers;


use App\Transformers\HotelTransformer;
use App\Transformers\RoomTransformer;
use Tests\TestCase;

class RoomTransformerTest extends TestCase
{

    public function testRoomTransform()
    {
        $hydratedHotels= $this->prepareHotelsList($this->hotels);
        foreach ($hydratedHotels as $hydratedHotel){
            $transformedRooms = RoomTransformer::transform($hydratedHotel->getRooms());
            $this->assertIsArray($transformedRooms);
            $this->assertIsArray($transformedRooms[0]['taxes']);
            $this->assertArrayHasKey('name', $transformedRooms[0]);
            $this->assertArrayHasKey('Advertiser', $transformedRooms[0]);
            $this->assertArrayHasKey('code', $transformedRooms[0]);
            $this->assertArrayHasKey('net_price', $transformedRooms[0]);
            $this->assertArrayHasKey('total_price', $transformedRooms[0]);
            $this->assertArrayHasKey('taxes', $transformedRooms[0]);
        }
    }
}
