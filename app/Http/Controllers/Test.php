<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAddressRequest;
use App\Models\User;
use Illuminate\Http\Request;

class Test extends Controller
{
	public function __construct()
	{
	}

	public function test()
	{
		return compact('');
	}
    //
	public function index(User $user)
	{
		$user = $user->first();
		dd($user->test());
		\DB::enableQueryLog();
		$max_user = $user->orderBy('id','desc')->find(106);
		dd($max_user->created_at);
		$user->name = '光年之外_'.++$max_user->id;
		$user->email = ++$max_user->id.$user->email;
		$user->password = password_hash('secret',PASSWORD_DEFAULT);
		$user->money = 1000000;
		$user->created_at = now()->toDateTimeString();
		$user->updated_at = now()->toDateTimeString();
		$user->save();
		dd($user->created_at,\DB::getQueryLog());
	}
}
