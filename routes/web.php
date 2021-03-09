<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Models\Player;
use Illuminate\Support\Facades\Hash;

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

$router->get('/test', ['middleware' => ['auth:player'], function () {
	return [
		'data' => Player::all(),
		'status' => 1
	];
}]);

$router->get('/', function () {
	return [
		'data' => Player::all(),
		'status' => 1
	];
});

$router->post('/player/login', function () {
	$credentials = request()->only(['username', 'password']);
	$token = auth('player')->attempt($credentials);
	if ($token) {
		return [
			'token' => $token,
			'status' => 1
		];
	} else {
		return ['status' => 0];
	}
});
