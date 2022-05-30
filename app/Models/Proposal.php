<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="proposals";
    protected $primaryKey="id";
    public $timestamps = true;

    protected $fillable = [
        'parent_id',
        'client_id',
        'client_adderss_id',
        'status',
        'proposal_date',
        'proposal_amount'
    ];
    protected $dates = ['deleted_at'];

    protected $casts = [
        //'proposal_date' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function proposal_details(){
        return $this->hasMany(Proposal_detail::class, 'proposal_id');
    }
    public function addresse(){
        // return $this->belongsTo('App\Models\Client');
        return $this->belongsTo(Addresse::class,'client_addresse_id');
    }
}
