<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'birth_year',
        'birth_month',
        'birth_day',
        'avatar',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
