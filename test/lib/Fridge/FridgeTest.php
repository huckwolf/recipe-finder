<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PC
 * Date: 14-5-11
 * Time: 1:54
 * To change this template use File | Settings | File Templates.
 */

use Fridge\Fridge as Fridge;
use Food\Food as Food;

class FridgeTest extends \PHPUnit_Framework_TestCase{

    function testFridgeInitObject(){
        $food[] = new Food(array(
            'item'   => 'bread',
            'amount' => 10,
            'unit'   => 'slices',
            'useBy'  => '25/12/2014',
        ));

        $food[] = new Food(array(
            'item'   => 'bread',
            'amount' => 10,
            'unit'   => 'slices',
            'useBy'  => '25/12/2014',
        ));

        $fridge = new Fridge($food);
        $fridge->getFoodList();
    }

    function testCheckFoodInFridge(){
        //define a json array input for function to work
        //define food in fridge
        $food = new Fridge(
            array(
                0 => new Food(array(
                    'item'   => 'bread',
                    'amount' => 10,
                    'unit'   => 'slices',
                    'useBy'  => '25/12/2014',
                )),
                1 => new Food(array(
                    'item'   => 'cheese',
                    'amount' => 10,
                    'unit'   => 'slices',
                    'useBy'  => '25/12/2014',
                ))
            )
        );

        //define ingredients
        $ingredients = array(
            0 => new Food(array(
                'item'   => 'bread',
                'amount' => 2,
                'unit'   => 'slices',
            )),
            1 => new Food(array(
                'item'   => 'cheese',
                'amount' => 2,
                'unit'   => 'slices',
            ))
        );

        $this->assertEquals(true, $food->getDish($ingredients));
    }
}