<?php


namespace Tests\Unit\App\Transformers;


use App\Transformers\HotelTransformer;
use Tests\TestCase;

class HotelTransformerTest extends TestCase
{

    public function testHotelTransform()
    {
        $hydratedHotels = HotelTransformer::transform($this->prepareHotelsList($this->hotels));
        $this->assertIsArray($hydratedHotels);
        $this->assertIsArray($hydratedHotels[0]['rooms']);
        $this->assertArrayHasKey('name', $hydratedHotels[0]);
        $this->assertArrayHasKey('stars', $hydratedHotels[0]);
        $this->assertArrayHasKey('rooms', $hydratedHotels[0]);
    }
}
