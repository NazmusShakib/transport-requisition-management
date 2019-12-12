<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Export extends Model
{
    protected $table = 'exports';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'requisition_no', 'requisition_date', 'requisition_location',
        'buyer_name', 'load_point', 'unload_point', 'items', 'qty',
        'cbm', 'no_of_van', 'load_time', 'unload_time', 'cut_off_time', 'cut_off_date',
        'fare', 'created_by', 'updated_by', 'transport_name', 'cover_van_capacity',
        'cover_van_no',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_by', 'updated_by'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
}
