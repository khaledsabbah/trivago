<?php


namespace App\Services;


use App\Criterias\FilterRedundantCriteria;
use App\Criterias\PriceSortCriteria;
use App\Factory\AbstractAdvertiserFactory;
use phpDocumentor\Reflection\Types\This;

/**
 * Class HotelService
 * @package App\Services
 */
class HotelService
{
    protected $sort = 1;
    private $hotels = [];

    /**
     * @return array
     */
    public function getHotels(): array
    {
        return $this->hotels;
    }

    /**
     * @param array $hotels
     * @return HotelService
     */
    public function setHotels(array $hotels): HotelService
    {
        $this->hotels = $hotels;
        return  $this;
    }


    public function getAdvertisersData(array $advertisers): HotelService
    {
        $this->sort = isset(request()->sort) && is_numeric(request()->sort) ? request()->sort : $this->sort;
        foreach ($advertisers as $advertiser) {
            $this->hotels = array_merge($this->hotels, AbstractAdvertiserFactory::Instantiate($advertiser)->mockAdvertiserResponse());
        }
        return $this;
    }

    public function removeRedundentRooms(): HotelService
    {
        FilterRedundantCriteria::meetCriteria($this->hotels, $this->sort);
        return $this;
    }

    public function SortHotelsByRoomPrice()
    {
        PriceSortCriteria::meetCriteria($this->hotels, $this->sort);
        return $this;
    }

    public function combinHotels(): HotelService
    {
        $filteredHotels = [];
        foreach ($this->hotels as $index => $hotel) {
            isset($filteredHotels[$hotel->getHotelName()]) ?
                $filteredHotels[$hotel->getHotelName()]->setRooms($hotel->getRooms()) : $filteredHotels[$hotel->getHotelName()] = $hotel;
        }
        $this->hotels = array_values($filteredHotels);
        return $this;
    }

}
