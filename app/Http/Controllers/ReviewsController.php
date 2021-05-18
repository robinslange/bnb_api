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

use App\Review
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function getAllReviews($roomid)
    {
        $review = review::findorFail($roomid);
        return $review
    }
    public function getReview($id) 
    {
        return response()->json(review::find($id));
    }
    public function create(Request $request) 
    {
        $Review = review::create($request->all());

        return response()->json($Review, 201);
    }
    public function update($id, Request $request) 
    {
        $Review = review::findorFail($id);
        $Review->update($request->all());

        return response()->json($Review, 200);
    }
    public function deleteReview($id) 
    {
        review::findorFail($id)->delete();
        return response('Deleted Succesfully!', 200)
    }
}