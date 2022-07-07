<?php
namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as User;

class Aggregators extends User
{
    use Notifiable;

     //gaurd how user are auth for request
     protected $gaurd  = 'agg';//the name of the guard in config/auth
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = []; // to make all field fillable
    // protected $fillable = [
    //     'fn', 
    //     'email', 
    //     'password',
    // ]; the specify the filed in customers table that you can fill 


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
