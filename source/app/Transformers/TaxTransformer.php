<?php


namespace App\Transformers;


use App\Contracts\ITransform;
use App\Entities\Tax;

/**
 * Class TaxTransformer
 * @package App\Transformers
 */
class TaxTransformer implements ITransform
{

    /**
     * @param  Tax[]
     * @return array
     */
    public static function transform($taxes): array
    {
        // TODO: Implement transform() method.
        $transformerData = [];
        foreach ($taxes as $tax) {
            $transformerData[] = [
                'amount' => $tax->getAmount(),
                'currency' => $tax->getCurrency(),
                'type' => $tax->getType(),
            ];
        }

        return $transformerData;
    }
}
