<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="tasks";
    protected $primaryKey="id";
    public $timestamps = true;

    protected $fillable = [
        'project_id',
        'name',
        'sales_id',
        'manager_id',
        'delivery_date',
        'actual_delivery_date',
        'status',
        'image'
    ];
    protected $dates = ['deleted_at'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
