<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Player extends Model implements AuthenticatableContract, AuthorizableContract, JWTSubject
{
	use Authenticatable, Authorizable, HasFactory;
	protected $table = 'player';
	protected $guard = 'player';

	protected $fillable = [
		'username',
		'password'
	];

	protected $hidden = [
		'password'
	];

	public function getJWTIdentifier()
	{
		return $this->getKey();
	}

	public function getJWTCustomClaims()
	{
		return ['guard' => 'player'];
	}
	
}
