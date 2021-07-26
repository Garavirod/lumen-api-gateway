<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


// Versionamiento de servicos
$router->group(['prefix'=>'/v1'],function () use ($router){

     /* Authenticate */
     $router->group(['prefix'=>'/auth','middleware' =>'client.credentials'],function () use ($router){
        /* POST */
        $router->post('/register', 'Users\UsersController@store');
        /* GET */
        $router->get('/list', 'Users\UsersController@index');
        $router->get('/authenticate/{user}', 'Users\UsersController@show');
        /* PUT */
        $router->put('/authenticate/{user}/','Users\UsersController@update');
        $router->patch('/authenticate/{user}/','Users\UsersController@update');
        /* DELETE */
        $router->delete('/authenticate/{user}/','Users\UsersController@delete');
    });

    /* Books */
    $router->group(['prefix'=>'/books', 'middleware' =>'client.credentials'],function () use ($router){
        /* POST */
        $router->post('/register', 'Book\BookController@store');
        /* GET */
        $router->get('/list', 'Book\BookController@index');
        $router->get('/books/{book}', 'Book\BookController@show');
        /* PUT */
        $router->put('/books/{book}/','Book\BookController@update');
        $router->patch('/books/{book}/','Book\BookController@update');
        /* DELETE */
        $router->delete('/books/{book}/','Book\BookController@delete');
    });
    /* Authors */
    $router->group(['prefix'=>'/users', 'middleware' =>'client.credentials'],function () use ($router){
        /* POST */
        $router->post('/register', 'Author\AuthorController@store');
        /* GET */
        $router->get('/list', 'Author\AuthorController@index');
        $router->get('/authors/{author}', 'Author\AuthorController@show');
        /* PUT */
        $router->put('/authors/{author}/','Author\AuthorController@update');
        $router->patch('/authors/{author}/','Author\AuthorController@update');
        /* DELETE */
        $router->delete('/authors/{author}/','Author\AuthorController@delete');
    });

});

