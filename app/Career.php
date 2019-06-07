<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $fillable = [
        'start_year',
        'end_year',
        'start_month',
        'end_month',
        'details',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
