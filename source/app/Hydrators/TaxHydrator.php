<?php


namespace App\Hydrators;


use App\Contracts\IHydrate;
use App\Entities\Tax;

/**
 * Class TaxHydrator
 * @package App\Hydrators
 */
class TaxHydrator implements IHydrate
{
    /**
     * @param array $data
     * @param array|null $keys
     * @return Tax|mixed
     */
    public static function hydrate(array $data, array $keys = null)
    {
        // TODO: Implement hydrate() method.
        $tax = new Tax();
        isset($data['amount'])?$tax->setAmount($data['amount']):null;
        isset($data['currency'])?$tax->setCurrency($data['currency']):null;
        isset($data['type'])?$tax->setType($data['type']):null;
        return $tax;
    }

}
