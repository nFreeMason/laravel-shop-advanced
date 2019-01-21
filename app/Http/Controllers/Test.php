<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAddressRequest;
use App\Models\User;
use Illuminate\Http\Request;

class Test extends Controller
{
    //
	public function index(User $user)
	{
		$user = $user->find(1);
		$user->money += 888;
		$user->save();
		dd($user);
	}
}
