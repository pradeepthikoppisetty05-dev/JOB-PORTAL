<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
        'employer_id',
        'title',
        'description',
        'location',
        'salary',
    ];

    public function employer()
    {
        return $this->belongsTo(User::class, 'employer_id');
    }

    public function applications(){
        return $this->hasMany(Application::class);
    }

    public function savedPositions(){
        return $this->belongsToMany(User::class,'saved_positions')->withTimestamps();
    }

}
