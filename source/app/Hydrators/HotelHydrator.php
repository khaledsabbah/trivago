<?php


namespace App\Hydrators;


use App\Contracts\IHydrate;
use App\Entities\Hotel;

class HotelHydrator implements IHydrate
{
    public static function hydrate(array $data, array $hotelKeys = null)
    {
        // TODO: Implement hydrate() method.
        $hotel = new Hotel();
        $hotel->setName($data[$hotelKeys['name']]);
        $hotel->setStars($data[$hotelKeys['stars']]);
        return $hotel;
    }

}
