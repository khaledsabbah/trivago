<?php


namespace App\Advertisers;


class Airbnb extends AbstractAdvertiser
{

    const API_URL = 'https://f704cb9e-bf27-440c-a927-4c8e57e3bad1.mock.pstmn.io/s2/availability';

    protected $hotelKeys = ['name' => 'name', 'stars' => 'stars', 'rooms' => 'rooms'];


    protected $roomKeys = ['code' => 'code', 'name' => 'name', 'net_price' => 'net_rate', 'taxes' => 'taxes', 'total_price' => "totalPrice"];
}
