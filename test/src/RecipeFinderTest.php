<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PC
 * Date: 14-5-11
 * Time: 1:56
 * To change this template use File | Settings | File Templates.
 */

use Food\Food as Food;
use Fridge\Fridge as Fridge;
use Recipe\Recipe as Recipe;
use RecipeFinder\RecipeFinder as RecipeFinder;

class RecipeFinderTest extends \PHPUnit_Framework_TestCase{

    //this class is for finding the best matching food, so we need to init 2 inputs and see if the result is correct.
    function testLoadingFilesAndCheckMatchingFood(){
        $recipeFinder = new RecipeFinder(
            __DIR__.'/../fridge.csv',
            file_get_contents(__DIR__.'/../recipes.json')
        );

        //base on fridge.csv under test folder, mixed salad,150,grams,26/12/2013, the salad sandwich no longer is a good result.
        $this->assertEquals('grilled cheese on toast', $recipeFinder->findBestMatchFoodForTonight());
    }
}