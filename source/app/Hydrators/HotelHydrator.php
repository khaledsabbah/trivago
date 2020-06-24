<?php


namespace App\Hydrators;


use App\Contracts\IHydrate;
use App\Entities\Hotel;

/**
 * Class HotelHydrator
 * @package App\Hydrators
 */
class HotelHydrator implements IHydrate
{
    /**
     * @param array $data
     * @param array|null $hotelKeys
     * @return Hotel|mixed
     */
    public static function hydrate(array $data, array $hotelKeys = null)
    {
        // TODO: Implement hydrate() method.
        $hotel = new Hotel();
        $hotel->setHotelName($data[$hotelKeys['name']]);
        $hotel->setStars($data[$hotelKeys['stars']]);
        return $hotel;
    }

}
