<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PC
 * Date: 14-5-11
 * Time: 1:54
 * To change this template use File | Settings | File Templates.
 */

use Recipe\Recipe as Recipe;
use Food\Food as Food;

class RecipeTest extends \PHPUnit_Framework_TestCase{

    function testGetSetMethod(){

        // init food object
        $recipe = new Recipe('salad sandwich', array(
            0 => Array(
                'item' => 'bread',
                'amount' => 10,
                'unit' => 'slices'
             ),
            1 => Array(
                'item' => 'mixed salad',
                'amount' => 100,
                'unit' => 'grams'
            ),
        ));

        //checking result
        $this->assertEquals('salad sandwich', $recipe->getName());

        //change Recipe Name and check
        $recipe->setName('Something else');
        $this->assertEquals('Something else', $recipe->getName());

        //each of the ingredients must be an valid Food object
        $food[] = new Food(array(
            'item'   => 'bread',
            'amount' => 10,
            'unit'   => 'slices',
        ));
        $food[] = new Food(array(
            'item'   => 'mixed salad',
            'amount' => 100,
            'unit'   => 'grams',
        ));
        $this->assertEquals($food, $recipe->getIngredients());
    }
}