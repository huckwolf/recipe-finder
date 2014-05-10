<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PC
 * Date: 14-5-10
 * Time: 9:18
 * To change this template use File | Settings | File Templates.
 */

namespace RecipeFinder;

use Food\Food as Food;
use Fridge\Fridge as Fridge;
use Recipe\Recipe as Recipe;

class RecipeFinder{

    protected $fridge;
    protected $recipe;

    public function __construct($fridge = null, $recipes = null)
    {
        if (!empty($fridge)) {
            // load fridge
            $this->fridge = $this->loadFoodFromFiles($fridge);
        }

        if (!empty($recipes)) {
            // load recipe
            $this->recipe = $this->loadRecipeFromJson($recipes);
        }
    }

    public function loadFoodFromFiles($fridge){

        return true;
    }

    public function loadRecipeFromJson($recipes){

        return true;
    }

    public function findBestMatchFoodForTonight(){

        return true;
    }

}