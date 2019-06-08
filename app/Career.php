<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $fillable = [
        'experience',
        'start_year',
        'end_year',
        'details',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
