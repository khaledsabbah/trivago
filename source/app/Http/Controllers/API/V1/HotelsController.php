<?php

namespace App\Http\Controllers\API\V1;

use App\Factory\AbstractAdvertiserFactory;
use App\Http\Controllers\ApiController;
use App\Services\HotelService;
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
        $hotels=[];
        $advertisers = config('advertisers');
        foreach ($advertisers as $advertiser) {
            array_push($hotels, AbstractAdvertiserFactory::Instantiate($advertiser)->mockAdvertiserResponse());
        }
    }
}
