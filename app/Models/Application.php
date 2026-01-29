<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'position_id',
        'applicant_id',
        'resume',
        'status',
    ];

    public function position(){
        return $this->belongsTo(Position::class);
    }

    public function applicant(){
        return $this->belongsTo(User::class,'applicant_id');
    }
}
