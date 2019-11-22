<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dob',
        'bio',
        'address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
