<?php

namespace Tests\MockData;

use App\Entities\Hotel;

abstract class HotelsMockData implements IMockAdvertisers
{
    public static function mockAdvertiser(): array
    {
        // TODO: Implement mockAdvertiser() method.
        return $hotels= json_decode(self::AIRBNB, true)['hotels'];
    }

    public static function mockAdvertisersList(): array
    {
        // TODO: Implement mockAdvertisersList() method.
        $airBnb = json_decode(self::AIRBNB, true)['hotels'];
        $booking = json_decode(self::BOOKING, true)['hotels'];
        return  array_merge($airBnb, $booking);
    }
}
