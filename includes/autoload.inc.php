<?php
spl_autoload_register('myAutoLoader');

function myAutoLoader($className) {
    $path = '../classes/';
    $extension = '.class.php';
    $filename = $path . $className . $extension;

    if (!file_exists($filename)) {
        return false;
    }
    
    include_once $filename;
}