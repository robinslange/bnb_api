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

use App\Room;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    public function checkAvailable(Request $request) 
    {
        $this->validate($request, [
            'inDate' => 'required',
            'outDate'=> 'required'
        ]);
        $inDate = $request->input('inDate');
        $outDate = $request->input('outDate');

        $available = Room::where('checkinDate','>=' ,$inDate)->where('checkoutDate','<=' ,$outDate)->get();
        
        if($available) {
            return response()->json($available, 200);
        }
    }
    public function getRooms()
    {
        return response()->json(room::all());
    }
    public function getSingleRoom($id) 
    {
        return response()->json(room::find($id));
    }
    public function create(Request $request) 
    {
        $this->validate($request, [
            'roomname' => 'required|string',
            'description' => 'required|string|max:500',
            'roomtype' => 'required|string',
            'beds' => 'required|int'
        ]);
        $Room = room::create($request->all());

        return response()->json($Room, 201);
    }
    public function update($id, Request $request) 
    {
        $this->validate($request, [
            'roomname' => 'required|string',
            'description' => 'required|string|max:500',
            'roomtype' => 'required|string',
            'beds' => 'required|int'
        ]);

        $Room = room::findorFail($id);
        $Room->update($request->all());

        return response()->json($Room, 200);
    }
    public function delete($id) 
    {
        room::findorFail($id)->delete();
        return response('Deleted Succesfully!', 200);
    }
}