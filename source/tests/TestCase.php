<?php

namespace Tests;

use App\Hydrators\HotelHydrator;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\MockData\HotelsMockData;

abstract class TestCase extends BaseTestCase
{
    protected $hotelKeys = ['name' => 'name', 'stars' => 'stars', 'rooms' => 'rooms'];
    protected $roomKeys = ['code' => 'code', 'net_price' => 'net_price', 'taxes' => 'taxes', 'total_price' => "total"];

    use CreatesApplication;
    public $hotels=[];

    public function setUp(): void
    {
        $this->hotels = HotelsMockData::mockAdvertiser();
    }

    /**
     * @return array
     */
    public function getHotels(): array
    {
        return $this->hotels;
    }

    /**
     * @param array $hotels
     */
    public function setHotels(array $hotels): void
    {
        $this->hotels = $hotels;
    }

    public function prepareHole($hotel)
    {
        return HotelHydrator::hydrate($hotel, $this->hotelKeys)
            ->setRoomKeys($this->roomKeys)
            ->setRooms($hotel[$this->hotelKeys['rooms']], substr(strrchr(get_class($this), '\\'), 1));;
    }

    public function prepareHotelsList($hotel)
    {
        $hydratedHotels=[];
        foreach ($hotel as $hotel){
            $hydratedHotels[]= HotelHydrator::hydrate($hotel, $this->hotelKeys)
                ->setRoomKeys($this->roomKeys)
                ->setRooms($hotel[$this->hotelKeys['rooms']], substr(strrchr(get_class($this), '\\'), 1));
        }
        return $hydratedHotels;
    }

}
