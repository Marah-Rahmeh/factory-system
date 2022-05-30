<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Addresse extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="addresses";
    protected $primaryKey="id";
    public $timestamps = true;

    protected $fillable = [
        'client_id',
        'name',
        'province',
        'neighborhood',
        'pobox',
        'contact_name',
        'contact_personal_id',
        'contact_mobile'

    ];
    protected $dates = ['deleted_at'];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function client(){
        // return $this->belongsTo('App\Models\Client');
        return $this->belongsTo(Client::class);
    }

    public function proposal(){
        return $this->hasMany(Proposal::class);
    }
}
