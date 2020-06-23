<?php


namespace App\Entities;


use App\Hydrators\RoomHydrator;

/**
 * Class Hotel
 * @package App\Entities
 */
class Hotel
{

    /**
     * @var array
     */
    private $roomKeys;

    /**
     * @var string
     */
    private $name;
    /**
     * @var int
     */
    private $stars;
    /**
     * @var Room[]
     */
    private $rooms=[];

    /**
     * @return string
     */
    public function getRoomKeys(): array
    {
        return $this->roomKeys;
    }

    /**
     * @return string
     */
    public function setRoomKeys(array $keys): Hotel
    {
        $this->roomKeys = $keys;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Hotel
     */
    public function setName(string $name): Hotel
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getStars(): int
    {
        return $this->stars;
    }

    /**
     * @param int $stars
     * @return Hotel
     */
    public function setStars(int $stars): Hotel
    {
        $this->stars = $stars;
        return $this;
    }

    /**
     * @return Room[]
     */
    public function getRooms(): array
    {
        return $this->rooms;
    }

    /**
     * @param Room[] $rooms
     * @return Hotel
     */
    public function setRooms(array $rooms): Hotel
    {
        foreach ($rooms as $room) {
            array_push($this->rooms, RoomHydrator::hydrate((array)$room, $this->getRoomKeys()));
        }

        return $this;
    }


}
