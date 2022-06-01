<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Basic route to handle the request for now
Route::get('/', function(){
    /**
     *  Users array to pass to our view. Just using crude dummy data for now. Should be provided by application models / controllers.
     **/
    $users = [];

    for( $i=1; $i<11; $i++ ){
        // Create a new stdClass user object and populate some properties
        $user = new \stdClass;
        $user->id = $i;
        $user->email = 'test@test.com';

        // Stack this user object into our array
        $users[] = $user;
    }

    /**
     *  Data array to pass to our view. Just using crude dummy data for now.
     *
     * $users - our 10 dummy users
     * $isAdmin - our boolean for admin specific logic - I'd personally use @auth directives
     * $isTesting - our boolean for dev specific logic - I'd personally use @environment directives
     **/
    $data = [
        'users'     => $users,
        'isAdmin'   => 1,
        'isTesting' => 0,
    ];

    return view('crown-oil-test.index', compact('data'));
});

// Basic route to handle the AJAX request for now
Route::get('/users/{id}/delete', function($id){

    // Can change the succes from 'true' / 'false' to test the front-end logic
    $response = [
        'success' => true
    ];

    return  $response;
});
