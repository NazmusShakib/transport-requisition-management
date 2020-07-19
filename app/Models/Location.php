<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Location extends Model
{
    use SoftDeletes;

    protected $table = 'locations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'short_name', 'description'
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_by'
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function($model)
        {
            $model->created_by = Auth::id();
        });
    }

    public function scopeSearch($query, $searchTerm) {
        return $query
            ->where('name', 'like', "%" . $searchTerm . "%")
            ->orWhere('short_name', 'like', "%" . $searchTerm . "%");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id')
            ->select('id', 'name', 'email', 'phone');
    }
}
