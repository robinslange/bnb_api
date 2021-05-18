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

use App\Review;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function getAllReviews()
    {
        return response()->json(review::all());
    }
    public function getReview($id) 
    {
        return response()->json(review::find($id));
    }
    public function getRoomReviews($id) 
    {
        $reviews = review::where('room_id', $id)->get();
        return response()->json($reviews, 200);
    }
    public function getBookingReviews($id) 
    {
        $reviews = review::where('booking_id', $id)->get();
        return response()->json($reviews, 200);
    }
    public function create(Request $request) 
    {
        $this->validate($request, [
            'room_id' => 'required',
            'customer_id' => 'required',
            'booking_id' => 'required',
            'review' => 'required|string|max:500',
            'rating' => 'required|int'
        ]);
        $Review = review::create($request->all());

        return response()->json($Review, 201);
    }
    public function update($id, Request $request) 
    {
        $this->validate($request, [
            'room_id' => 'required',
            'customer_id' => 'required',
            'review' => 'required|string|max:500',
            'rating' => 'required|int'
        ]);

        $Review = review::findorFail($id);
        $Review->update($request->all());

        return response()->json($Review, 200);
    }
    public function delete($id) 
    {
        review::findorFail($id)->delete();
        return response('Deleted Succesfully!', 200);
    }
}