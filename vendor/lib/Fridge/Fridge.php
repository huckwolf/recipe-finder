<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PC
 * Date: 14-5-10
 * Time: 12:18
 * To change this template use File | Settings | File Templates.
 */

namespace Fridge;

class Fridge{

    protected $food;

    /**
     * @param array $food
     */
    public function __construct($food = array()){
        $this->food = $food;
    }

    /**
     * @return array
     */
    public function getFoodList(){
        return $this->food;
    }

    /**
     * @param $ingredients
     * @return bool
     */
    public function getDish($ingredients){
        $dishes = $this->checkFoodInFridge($ingredients);
        return $dishes;
    }

    /**
     * @param $ingredients
     * @return bool
     */
    private function checkFoodInFridge($ingredients){

        $foodCount = count($ingredients);
        if($foodCount > 0){
            $take  = 0;
            $useBy = array();
            foreach($ingredients as $ingredient){
                foreach($this->food as $food){
                    // check if the food is qualified
                    if($food->getItem() == $ingredient->getItem()
                        && $food->getAmount() >= $ingredient->getAmount()
                        && $food->getUnit() == $ingredient->getUnit()
                        && strtotime(str_replace('/', '-', $food->getUseBy())) > time()
                    ){
                        $take++;
                        $useBy[] = strtotime(str_replace('/', '-', $food->getUseBy()));
                    }
                }
            }
            if($foodCount == $take){
                sort($useBy);
                return $useBy[0];
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}