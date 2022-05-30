<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="projects";
    protected $primaryKey="id";
    public $timestamps = true;

    protected $fillable = [
        'contract_id',
        'name',
        'manager_id',
        'plane_delivery_date',
        'delivery_date',
        'status',
        'start_date',
        'end_date'
    ];
    protected $dates = ['deleted_at'];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function contract(){
        return $this->belongsTo(Contract::class);
    }
    public function tasks(){
        return $this->hasMany(Task::class);
    }

}

