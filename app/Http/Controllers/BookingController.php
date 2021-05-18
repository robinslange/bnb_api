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

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function getAllBookings()
    {
        return response()->json(booking::all());
    }
    public function getBooking($id) 
    {
        return response()->json(booking::find($id));
    }
    public function create(Request $request) 
    {
        $booking = Booking::create($request->all());

        return response()->json($booking, 201);
    }
    public function update($id, Request $request) 
    {
        $booking = Booking::findorFail($id);
        $booking->update($request->all());

        return response()->json($booking, 200);
    }
    public function deleteBooking($id) 
    {
        Booking::findorFail($id)->delete();
        return response('Deleted Succesfully!', 200);
    }
}