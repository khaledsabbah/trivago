<?php


namespace App\Hydrators;


use App\Contracts\IHydrate;
use App\Entities\Room;

/**
 * Class RoomHydrator
 * @package App\Hydrators
 */
class RoomHydrator implements IHydrate
{
    /**
     * @param array $data
     * @param array|null $keys
     * @return Room|mixed
     */
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
