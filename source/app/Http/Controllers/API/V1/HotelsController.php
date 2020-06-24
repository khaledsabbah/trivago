<?php

namespace App\Http\Controllers\API\V1;

use App\Factory\AbstractAdvertiserFactory;
use App\Http\Controllers\ApiController;
use App\Services\HotelService;
use App\Transformers\HotelTransformer;
use Illuminate\Http\Request;

class HotelsController extends ApiController
{

    protected $hotelService;

    /**
     * HotelsController constructor.
     * @param HotelService $hotelService
     */
    public function __construct(HotelService $hotelService)
    {
        $this->hotelService = $hotelService;
    }

    public function index(Request $request)
    {
        $hotels= $this->hotelService
            ->getAdvertisersData(config('advertisers'))
            ->combinHotels()
            ->removeRedundentRooms()
            ->SortHotelsByRoomPrice()
            ->getHotels();
        return $this->respond(['hotels'=>HotelTransformer::transform($hotels)]);
    }
}
