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

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function getCustomer($id)
    {
        return response()->json(Customer::find($id));
    }
    public function register(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'firstname' => 'required',
            'lastname' => 'required',
            'password' => 'required'
        ]);
        $customer = Customer::create($request->all());

        return response()->json($customer, 201);
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $email = $request->input('email');
        $password = $request->input('password');

        $user = Customer::find($email);
        if ($user->password === $password) {
            return response()->json($user, 200);
        } else {
            return response()->json(401);
        }
    }
}
