<?php
/** @var \Laravel\Lumen\Routing\Router $router */

use Illuminate\Http\Response;

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



$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    
    //bookings
    $router->get('bookings', ['uses' => 'BookingController@getAllBookings']);
    $router->get('bookings/{id}', ['uses' => 'BookingController@getBooking']);
    $router->post('bookings', ['uses' => 'BookingController@create']);
    $router->delete('bookings/{id}', ['uses' => 'BookingController@delete']);
    $router->put('bookings/{id}', ['uses' => 'BookingController@update']);

    //reviews
    $router->get('reviews', ['uses' => 'ReviewsController@getAllReviews']);
    $router->get('reviews/{id}', ['uses' => 'ReviewsController@getReview']);
    $router->get('reviews/room/{id}', ['uses' => 'ReviewsController@getRoomReviews']);
    $router->post('reviews', ['uses' => 'ReviewsController@create']);
    $router->delete('reviews/{id}', ['uses' => 'ReviewsController@delete']);
    $router->put('reviews/{id}', ['uses' => 'ReviewsController@update']);
});

// $router->get('bookings/')
