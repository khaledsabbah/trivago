<?php


namespace Tests\Unit\App\Hydrators;


use App\Entities\Hotel;
use App\Entities\Room;
use Tests\TestCase;

class RoomHydrateTest extends HotelHydratorTest
{
    public function testRoomHydrator()
    {
        foreach ($this->hotels as $index=>$hotel){
            $hotelHydrator = $this->prepareHole($hotel);
            $hydratedRooms= $hotelHydrator->getRooms();
            array_map(function ($hydratedRoom,$room)use($hotel,$hotelHydrator){
                $this->assertIsObject($hydratedRoom);
                $this->assertInstanceOf(Room::class, $hydratedRoom);
                $this->assertEquals($room['name'],$hydratedRoom->getName());
                $this->assertEquals($room['code'],$hydratedRoom->getCode());
                $this->assertEquals($room['total'],$hydratedRoom->getTotalPrice());
            },$hydratedRooms,$this->hotels[$index]['rooms']);
        }
    }
}
