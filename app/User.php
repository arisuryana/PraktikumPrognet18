<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\NotifUser;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','status','profile_image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function review_customer()
    {
        return $this->hasMany(ProductReview::class, 'user_id');
    }

    public function transaksi_customer()
    {
        return $this->hasMany(Transaction::class, 'user_id');
    }

    public function notifications(){
        return $this->morphMany(NotifUser::class, 'notifiable')
                    ->orderBy('created_at','desc');
    }
}
