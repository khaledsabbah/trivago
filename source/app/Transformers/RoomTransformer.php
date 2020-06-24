<?php


namespace App\Transformers;


use App\Contracts\ITransform;
use App\Entities\Room;

/**
 * Class RoomTransformer
 * @package App\Transformers
 */
class RoomTransformer implements ITransform
{

    /**
     * @param Room []
     * @return array
     */
    public static function transform($rooms): array
    {
        // TODO: Implement transform() method.
        $transformerData = [];
        foreach ($rooms as $room) {
            $transformerData[] = [
                'code' => $room->getCode(),
                'name' => $room->getName(),
                'net_price' => $room->getNetPrice(),
                'taxes' => TaxTransformer::transform($room->getTaxes()),
                'total_price' => $room->getTotalPrice(),
            ];
        }

        return $transformerData;
    }
}
