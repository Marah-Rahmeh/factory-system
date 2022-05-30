<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="employees";
    protected $primaryKey="id";
    public $timestamps = true;


    protected $fillable = [
        'first_name',
        'last_name',
        'user_id',
        'personal_id',
        'mobile_number',
        'addresse',
        'position_id'
    ];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function position()
    {
        return $this->belongsTo(Position::class,'postion_id');
    }

}
