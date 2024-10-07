<?php
return [
    'GET' => [
        '' => 'App\Controllers\HomeController@index',
        'products' => 'App\Controllers\ProductsController@index',
        'Categories' => 'App\Controllers\CategoriesController@index',
        'Categories/phones' => 'App\Controllers\CategoriesController@phones',
        'Categories/laptops' => 'App\Controllers\CategoriesController@laptops',
        'Categories/tablets' => 'App\Controllers\CategoriesController@tablets',
    ],
    'POST' => [
        'products' => 'App\Controllers\ProductsController@store',
    ],
];