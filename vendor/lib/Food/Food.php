<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PC
 * Date: 14-5-10
 * Time: 4:57
 * To change this template use File | Settings | File Templates.
 */

namespace Food;

class Food
{
    const UNIT_TYPE_OF     = 'of';
    const UNIT_TYPE_GRAMS  = 'grams';
    const UNIT_TYPE_ML     = 'milliliters';
    const UNIT_TYPE_SLICES = 'slices';

    protected $item;
    protected $unit;
    protected $amount;
    protected $useBy;

    public function __construct($params = array()){
        if(!empty($params)){
            foreach($params as $name => $value){
                $method = 'set'.$name;
                if(method_exists($this, $method)){
                    $this->$method($value);
                }
            }
        }
    }

    /**
     * @param string $item
     * @throws \InvalidArgumentException
     */
    public function setItem($item){
        if (!is_string($item)) {
            throw new \InvalidArgumentException('Invalid parameter input for name: ' . $item. '. Expecting string');
        }
        $this->item = (string) $item;
    }

    /**
     * @return string
     */
    public function getItem(){
        return $this->item;
    }

    /**
     * @param string $unit
     * @throws \InvalidArgumentException
     */
    public function setUnit($unit){
        $const_var = 'UNIT_TYPE_'.strtoupper($unit);
        if (is_null($const_var)) {
            throw new \InvalidArgumentException('Invalid parameter input for unit: ' . $unit);
        }
        $this->unit = $unit;
    }

    /**
     * @return string
     */
    public function getUnit(){
        return $this->unit;
    }

    /**
     * @param int $amount
     * @throws \InvalidArgumentException
     */
    public function setAmount($amount){
        if (!is_numeric($amount)) {
            throw new \InvalidArgumentException('Invalid parameter input for amount: ' . $amount. '. Expecting integer');
        }
        $this->amount = (int) $amount;
    }

    /**
     * @return int
     */
    public function getAmount(){
        return $this->amount;
    }

    /**
     * @param $useBy
     * @throws \InvalidArgumentException
     * @internal param int $useBy
     */
    public function setUseBy($useBy){
        $date = explode('/', $useBy);
        if (!checkdate($date[1], $date[0], $date[2])) {
            throw new \InvalidArgumentException('Invalid parameter input for use-by: ' . $useBy. '. Expecting timestamp by using format (dd/mm/yy)');
        }
        $this->useBy = $useBy;
    }

    /**
     * @return int $useBy
     */
    public function getUseBy(){
        return $this->useBy;
    }

}