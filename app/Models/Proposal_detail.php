<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Proposal_detail extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="proposal_details";
    protected $primaryKey="id";
    public $timestamps = true;


    protected $fillable = [
        'proposal_id',
        'item_type',
        'item_no',
        'item_details',
        'img_url',
        'es_width',
        'es_height',
        'fn_width',
        'fn_height'
    ];
    protected $dates = ['deleted_at'];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function proposal(){
        return $this->belongsTo(Proposal::class);
    }

}
