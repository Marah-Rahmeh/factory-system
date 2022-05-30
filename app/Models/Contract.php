<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="contracts";
    protected $primaryKey="id";
    public $timestamps = true;

    protected $fillable = [
        'proposal_id',
        'price_amount',
        'status',
        'start_date',
        'delivery_date'
    ];
    protected $dates = ['deleted_at'];

    protected $casts = [
        'start_date' => 'datetime',
        'delivery_date' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function proposal(){
        return $this->belongsTo('App\Proposal');
    }

    public function project(){
        return $this->hasOne(Project::class, 'contract_id');
    }
}
