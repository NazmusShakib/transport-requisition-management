<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    protected $table = 'imports';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'requisition_no', 'requisition_date', 'requisition_location',
        'consignee_name', 'lc_no', 'lc_date', 'items', 'qty', 'no_of_box', 'no_of_drum',
        'no_of_jar', 'no_of_bag', 'no_of_roll', 'no_of_bell', 'no_of_cbm', 'cnf_name', 'unload_time',
        'jetty_sorkar_cell_no', 'load_time', 'get_out_time', 'storage_location',
        'store_concern_name', 'store_concern_cell_no', 'no_of_van', 'fare',
        'transport_name', 'cover_van_capacity', 'cover_van_no', 'created_by', 'updated_by'
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
