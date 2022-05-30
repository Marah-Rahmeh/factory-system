<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="positions";
    protected $primaryKey="id";
    public $timestamps = true;


    protected $fillable = [
        'name',
        'Descreption'
    ];
    protected $dates = ['deleted_at'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function employee()
    {
        return $this->hasMany(Employ::class,'position_id');
    }
}
