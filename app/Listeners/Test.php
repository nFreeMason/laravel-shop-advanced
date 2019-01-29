<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class 	Test
{


	public function saved($user)
	{
		dd('test',$user);
	}

    public function tested($user)
	{
		dd(123123,$user);
	}
}
