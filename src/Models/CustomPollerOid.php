<?php

namespace Acamposm\SnmpPoller\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomPollerOid extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'custom_poller_oids';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'custom_poller_id',
        'name',
        'object_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'custom_poller_id',
        'created_at',
        'updated_at',
    ];

    /**
     * Get the Custom Poller related to this OID.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customPoller()
    {
        return $this->belongsTo(CustomPoller::class);
    }
}
