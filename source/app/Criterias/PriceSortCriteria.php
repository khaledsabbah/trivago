<?php


namespace App\Criterias;


use App\Contracts\ICriteria;
use App\Entities\Hotel;

/**
 * Class PriceSortCriteria
 * @package App\Criterias
 */
abstract class PriceSortCriteria implements ICriteria
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
            $rooms = $hotel->getRooms();
            usort($rooms, function ($r1, $r2) use($sortType) {
                switch ($sortType) {
                    case self::SORT_ASECENDING:
                        return ($r1->getTotalPrice() > $r2->getTotalPrice()) ? 1 : -1;
                        break;
                    case self::SORT_DESECENDING:
                        return ($r1->getTotalPrice() > $r2->getTotalPrice()) ? -1 : 1;
                        break;
                }

            });

            $hotel->resetRooms($rooms);
        }
        return $hotels;
    }

}
