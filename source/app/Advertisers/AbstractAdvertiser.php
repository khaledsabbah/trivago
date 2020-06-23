<?php


namespace App\Advertisers;


use App\Contracts\IAdvertiser;
use App\Hydrators\HotelHydrator;
use GuzzleHttp\Client;
use GuzzleHttp\Promise\PromisorInterface;

/**
 * Class AbstractAdvertiser
 * @package App\Advertisers
 */
abstract class AbstractAdvertiser implements IAdvertiser
{

    protected $hotels;
    protected $advertiserHotels = [];

    /**
     * AbstractAdvertiser constructor.
     */
    public function __construct()
    {
        $response = $this->getAdvertiserData();
        $response = json_decode($response->getBody(), true);
        if (isset($response['hotels']))
            $this->hotels = $response['hotels'];
    }


    /**
     * @return PromisorInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAdvertiserData()
    {
        // TODO: Implement getAdvertiserData() method.
        $client = new Client();
        return $client->request('GET', static::API_URL);
    }


    public function mockAdvertiserResponse(): array
    {
        // TODO: Implement mockResponse() method.
        foreach ($this->hotels as $hotel) {
            $hotelHydrator = HotelHydrator::hydrate($hotel, $this->hotelKeys)->setRoomKeys($this->roomKeys)->setRooms($hotel[$this->hotelKeys['rooms']]);
            array_push($this->advertiserHotels, $hotelHydrator);
        }
        return $this->advertiserHotels;
    }

}
