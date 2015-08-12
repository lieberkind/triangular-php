<?php

/*
|--------------------------------------------------------------------------
| Get autoloaded files and classes
|--------------------------------------------------------------------------
*/
require 'vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Get the input from the command line
|--------------------------------------------------------------------------
|
| If the user doesn't provide three arguments, we prompt them to do so
|
*/
$sides = array_slice($argv, 1);

if(count($sides) !== 3) {
    exit('Please provide three sides');
}

/*
|--------------------------------------------------------------------------
| Create the triangle and get its type
|--------------------------------------------------------------------------
|
| Finally, we try to create the triangle from the provided sides. If we
| succeed, we continue to print its type. If we fail for some reason, we
| print the cause to the user for them to act upon
|
*/
try {
    $triangle = new Triangular\Triangle($sides[0], $sides[1], $sides[2]);
    echo 'The triangle is ' . $triangle->getType();
    exit;
} catch (Exception $e) {
    exit($e->getMessage());
}
