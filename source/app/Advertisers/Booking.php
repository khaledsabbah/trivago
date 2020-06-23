<?php


namespace App\Advertisers;


class Booking extends AbstractAdvertiser
{
    const API_URL = 'https://f704cb9e-bf27-440c-a927-4c8e57e3bad1.mock.pstmn.io/s1/availability';

    protected $hotelKeys = ['name' => 'name', 'stars' => 'stars', 'rooms' => 'rooms'];


    protected $roomKeys = ['code' => 'code', 'net_price' => 'net_price', 'taxes' => 'taxes', 'total_price' => "total"];
}
