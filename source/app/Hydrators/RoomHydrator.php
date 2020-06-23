<?php


namespace App\Hydrators;


use App\Contracts\IHydrate;
use App\Entities\Room;

class RoomHydrator implements IHydrate
{
    public static function hydrate(array $data, array $keys = null)
    {
        // TODO: Implement hydrate() method.
        $room = new Room();
        isset($keys['code'])?$room->setCode($data[$keys['code']]):null;
        isset($keys['name'])?$room->setName($data[$keys['name']]):null;
        isset($keys['net_price'])?$room->setNetPrice($data[$keys['net_price']]):null;
        isset($keys['total_price'])?$room->setTotalPrice($data[$keys['total_price']]):null;
        isset($keys['taxes'])?$room->setTaxes((array) $data[$keys['taxes']]):null;
        return $room;
    }

}
