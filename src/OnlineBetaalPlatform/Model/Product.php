<?php

namespace OnlineBetaalPlatform\Model;

/**
 * Class Product
 */
class Product
{
    /** @var string */
    public $name;

    /** @var string */
    public $ean;

    /** @var integer */
    public $price;

    /** @var integer */
    public $quantity;

    /**
     * @param string $name
     * @param string $ean
     * @param int    $price
     * @param int    $quantity
     */
    public function __construct($name, $ean, $price, $quantity = 1)
    {
        $this->name     = $name;
        $this->ean      = $ean;
        $this->price    = $price;
        $this->quantity = $quantity;
    }

}
