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
        $this->hotelService
            ->getAdvertiserssData(config('advertisers'))
            ->combinHotels()
            ->removeRedundentRooms()
            ->SortHotelsByRoomPrice();
        return $this->respond(['hotels'=>HotelTransformer::transform($this->hotelService->getHotels())]);
    }
}
