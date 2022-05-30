<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table="users";
    protected $primaryKey="id";
    public $timestamps = true;


    protected $fillable = [
        'type',
        'user_name',
        'password',
        'email',
        'profile_img_url'

    ];



    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'cr_date' => 'datetime',
        'up_date' => 'datetime',
    ];

    public function client(){
        return $this->hasOne('App\Client','user_id','id');
    }
}
