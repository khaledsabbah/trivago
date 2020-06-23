<?php


namespace App\Entities;


use App\Hydrators\TaxHydrator;

/**
 * Class Room
 * @package App\Entities
 */
class Room
{

    /**
     * @var string
     */
    private $code;
    /**
     * @var string
     */
    private $name;
    /**
     * @var float
     */
    private $netPrice;
    /**
     * @var float
     */
    private $totalPrice;
    /**
     * @var array
     */
    private $taxes = [];


    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
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
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getNetPrice(): float
    {
        return $this->netPrice;
    }

    /**
     * @return float
     */
    public function getTotalPrice(): float
    {
        return $this->netPrice;
    }

    /**
     * @param float $netPrice
     */
    public function setNetPrice(float $netPrice): void
    {
        $this->netPrice = $netPrice;
    }

    /**
     * @param float $totalPrice
     */
    public function setTotalPrice(float $totalPrice): void
    {
        $this->totalPrice = $totalPrice;
    }

    /**
     * @return Tax[]
     */
    public function getTaxes(): array
    {
        return $this->taxes;
    }

    /**
     * @param array $taxes
     */
    public function setTaxes(array $taxes): void
    {
        foreach ($taxes as $tax) {
            if(!is_array($tax)){
                array_push($this->taxes, TaxHydrator::hydrate((array)$taxes));
                break;
            }
            array_push($this->taxes, TaxHydrator::hydrate((array)$tax));

        }
    }

}
