<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PC
 * Date: 14-5-11
 * Time: 1:54
 * To change this template use File | Settings | File Templates.
 */

use Food\Food as Food;

class FoodTest extends \PHPUnit_Framework_TestCase{

    function testGetSetMethod(){

        // init food object
        $food = new Food(array(
            'item'   => 'bread',
            'amount' => 10,
            'unit'   => 'slices',
            'useBy'  => '25/12/2014',
        ));

        //checking result
        $this->assertEquals('bread'      , $food->getItem());
        $this->assertEquals( 10          , (int) $food->getAmount());
        $this->assertEquals('slices'     , $food->getUnit());
        $this->assertEquals('25/12/2014' , $food->getUseBy());

        //change food object and check
        $food->setAmount('20');
        $this->assertEquals( 20          , (int) $food->getAmount());

        $food->setItem('Cheese');
        $this->assertEquals( 'Cheese'    , $food->getItem());
    }

    function testInvalidAmountInput()
    {
        new Food(array(
            'name'   => 'bread',
            'amount' => 'something else',
            'unit'   => 'slices',
            'useBy'  => '25/12/2014',
        ));
    }

    function testInvalidUnitInput()
    {
        new Food(array(
            'name'   => 'bread',
            'amount' => 10,
            'unit'   => 'Something else',
            'useBy'  => '25/12/2014',
        ));
    }

    function testInvalidUseByInput()
    {
        new Food(array(
            'name'   => 'bread',
            'amount' => 10,
            'unit'   => 'slices',
            'useBy'  => 'something else',
        ));
    }
}