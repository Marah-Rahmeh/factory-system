<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table="clients";
    protected $primaryKey="id";
    public $timestamps = true;


    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'personal_id',
        'home_number',
        'office_number',
        'mobile_number',
        'gender'
    ];
    protected $dates = ['deleted_at'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function addresse(){
        return $this->hasMany(Addresse::class);
    }

    public function proposal(){
        return $this->hasMany(Proposal::class);
    }

}
