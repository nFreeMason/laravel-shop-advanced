<?php

namespace App\Models;

use App\Listeners\Test;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

//    protected $relations = ['address'=>UserAddress::class];

	protected static $globalScopes = [
		'test'
	];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'email_verified',
    ];


	const CREATED_AT = null;
	const UPDATED_AT  = null;

	protected $observables = [
		'saved' => Test::class,
	];
//
//	protected $dispatchesEvents = [
//		'saved' => Test::class,
//		'tested' => Test::class
//	];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
//        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified' => 'boolean',
    ];


	public function scopeTest()
	{
		return 'tested';
	}

	public static function boot()
	{
		parent::boot(); // TODO: Change the autogenerated stub
	}

	public function scopeAddress()
	{
		return 'scopeAddress';
	}

//	public function getAddressAttribute()
//	{
//		return 'address';
//	}

	public function address()
    {
        return $this->hasMany(UserAddress::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function favoriteProducts()
    {
        return $this->belongsToMany(Product::class, 'user_favorite_products')
            ->withTimestamps()
            ->orderBy('user_favorite_products.created_at', 'desc');
    }
}
