<?php


namespace App\Hydrators;


use App\Contracts\IHydrate;
use App\Entities\Tax;

class TaxHydrator implements IHydrate
{
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
