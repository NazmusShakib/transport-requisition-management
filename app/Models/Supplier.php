<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use \Staudenmeir\EloquentJsonRelations\HasJsonRelationships;

class Supplier extends Model
{
    use SoftDeletes;
    use HasJsonRelationships;

    protected $table = 'suppliers';

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

    protected $casts = [
        'companies_id' => 'json',
        'buyers_id' => 'json',
        'party_types_id' => 'json',
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
            ->orWhere('contact_no', 'like', "%" . $searchTerm . "%")
            ->orWhere('contact_person', 'like', "%" . $searchTerm . "%")
            ->orWhere('designation', 'like', "%" . $searchTerm . "%")
            ->orWhere('email', 'like', "%" . $searchTerm . "%");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id')
            ->select('id', 'name', 'email', 'phone', 'profile_picture');
    }

    public function companies()
    {
        return $this->belongsToJson(Company::class, 'companies_id', 'id');
    }

    public function buyers()
    {
        return $this->belongsToJson(Buyer::class, 'buyers_id', 'id');
    }
}
