<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PC
 * Date: 14-5-10
 * Time: 4:57
 * To change this template use File | Settings | File Templates.
 */

namespace Food;

class FoodItem
{
    const UNIT_OF     = 'of';
    const UNIT_GRAMS  = 'grams';
    const UNIT_ML     = 'milliliters';
    const UNIT_SLICES = 'slices';

    protected $name;
    protected $unit;
    protected $amount;
    protected $date;

    private static $unitTypes = array();

    public function __construct($params = array())
    {

    }

    /**
     * @param string $name
     * @throws \InvalidArgumentException
     */
    public function setName($name)
    {
        if (!is_string($name)) {
            throw new \InvalidArgumentException('Invalid parameter input for name: ' . $name. '. Expecting string');
        }
        $this->name = (string) $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $unit
     * @throws \InvalidArgumentException
     */
    public function setUnit($unit)
    {
        if (!in_array($unit, self::$unitTypes)) {
            throw new \InvalidArgumentException('Invalid parameter passed for unit: ' . $unit . '. Allowed values are '.implode(', ', self::$unitTypes));
        }
        $this->unit = $unit;
    }

    /**
     * @return string
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * @param int $amount
     * @throws \InvalidArgumentException
     */
    public function setAmount($amount)
    {
        if (!is_numeric($amount)) {
            throw new \InvalidArgumentException('Invalid parameter input for amount: ' . $amount. '. Expecting integer');
        }
        $this->amount = (int) $amount;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

}