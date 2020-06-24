<?php


namespace App\Transformers;


use App\Contracts\ITransform;
use App\Entities\Hotel;

/**
 * Class HotelTransformer
 * @package App\Transformers
 */
class HotelTransformer implements ITransform
{

    /**
     * @param  Hotel[]
     * @return array
     */
    public static function transform($hotels): array
    {
        // TODO: Implement transform() method.
        $transformerData = [];
        foreach ($hotels as $hotel) {
            $transformerData[] = [
                'name' => $hotel->getHotelName(),
                'stars' => $hotel->getStars(),
                'rooms' => RoomTransformer::transform($hotel->getRooms()),
            ];
        }

        return $transformerData;
    }

}
