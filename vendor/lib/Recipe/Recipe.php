<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PC
 * Date: 14-5-10
 * Time: 4:43
 * To change this template use File | Settings | File Templates.
 */

namespace Recipe;

use Food\Food as Food;

class Recipe{

    private $name;
    private $ingredients;

    /**
     * @param string $name
     * @param array $ingredients
     */
    public function __construct($name = null, $ingredients = null) {
        if(!empty($name)) {
            $this->setName($name);
        }

        if(!empty($ingredients)) {
            $this->setIngredients($ingredients);
        }
    }

    /**
     * @param array $ingredients
     */
    public function setIngredients($ingredients)
    {
        foreach($ingredients as $ingredient) {
            $this->ingredients[] = new Food($ingredient);
        }
    }

    /**
     * @return Food
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

}