<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PC
 * Date: 14-5-10
 * Time: 12:18
 * To change this template use File | Settings | File Templates.
 */

namespace Fridge;

use Food\Food as Food;

class Fridge
{

    protected $food;

    public function __construct(Food $food)
    {
        $this->food = $food;
    }

    public function getDish($ingredients){

        //get all the dish for tonight;
        $dishes = $this->checkFoodInFridge($ingredients);

        return $dishes;
    }

    private function checkFoodInFridge($requestFood){

        //it has request food

        //it has sufficient amount of request food

        //it has not passed use-by date of the request food

        return true;
    }


}