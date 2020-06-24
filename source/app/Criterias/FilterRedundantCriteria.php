<?php


namespace App\Criterias;


use App\Contracts\ICriteria;
use App\Entities\Hotel;

/**
 * Class FilterRedundantCriteria
 * @package App\Criterias
 */
class FilterRedundantCriteria implements ICriteria
{
    /**
     * @param array $hotels
     * @param int $sortType
     * @return Hotel[]
     */
    public static function meetCriteria(array $hotels, int $sortType = self::SORT_ASECENDING): array
    {
        // TODO: Implement meetCriteria() method.
        foreach ($hotels as $hotel) {
            $rooms = [];
            foreach ($hotel->getRooms() as $room) {
                if (isset($rooms[$room->getCode()])) {
                    switch ($sortType) {
                        case self::SORT_ASECENDING:
                            if ($room->getTotalPrice() < $rooms[$room->getCode()]->getTotalPrice())
                                $rooms[$room->getCode()] = $room;
                            break;
                        case self::SORT_DESECENDING:
                            if ($room->getTotalPrice() > $rooms[$room->getCode()]->getTotalPrice())
                                $rooms[$room->getCode()] = $room;
                            break;
                    }
                } else {
                    $rooms[$room->getCode()] = $room;
                }
            }
            $hotel->resetRooms(array_values($rooms));
        }
        return  $hotels;
    }

}
