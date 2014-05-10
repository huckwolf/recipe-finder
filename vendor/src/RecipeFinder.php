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
    protected $fridgeFood;

    public function __construct($fridge = null, $recipes = null){
        if (!empty($fridge)) {
            // load fridge
            $this->fridge = $this->loadFoodFromFiles($fridge);
        }
        if (!empty($recipes)) {
            // load recipe
            $this->recipe = $this->loadRecipeFromJson($recipes);
        }

        $this->findBestMatchFoodForTonight();
    }

    public function loadFoodFromFiles($fridge){
        $putFoodInFridge = array();
        if(($handle = fopen($fridge, 'r')) !== false) {
            while(($data = fgetcsv($handle, 1000, ',')) !== false) {
                $putFoodInFridge[] = new Food(array(
                    'item'      => $data[0],
                    'amount'    => $data[1],
                    'unit'      => $data[2],
                    'useBy'     => $data[3],
                ));
            }
        }
        $fridgeFood = new Fridge($putFoodInFridge);
        return $fridgeFood;
    }

    public function loadRecipeFromJson($inputRecipes){
        $buffer = array();
        if (($recipes = json_decode($inputRecipes, true)) === false) {
            throw new \InvalidArgumentException("Invalid JSON format");
        }
        foreach ($recipes as $recipe) {
            $buffer[] = new Recipe($recipe['name'], $recipe['ingredients']);
        }
        return $buffer;
    }

    public function findBestMatchFoodForTonight(){
        $result = array();
        foreach($this->recipe as $recipe){
            if($this->fridge->getDish($recipe->getIngredients())){
                $result[] = $recipe->getName();
            }
        }
        return (count($result))?$result:"Order Takeout";
    }

}