<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PC
 * Date: 14-5-10
 * Time: 10:29
 * To change this template use File | Settings | File Templates.
 */

function __autoload($class){
    $parts      = explode('\\', $class);
    $class      = end($parts);
    $namespace  = prev($parts);

    if(file_exists('vendor/lib/'.$namespace.'/'.$class.'.php')){
        require 'vendor/lib/'.$namespace.'/'.$class.'.php';
    }elseif(file_exists('vendor/src/'.$class.'.php')){
        require 'vendor/src/'.$class.'.php';
    }else{
        echo 'Class "'.$class.'" is not found'."\n";
        exit;
    }
}