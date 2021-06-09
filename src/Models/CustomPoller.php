<?php

namespace Acamposm\SnmpPoller\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomPoller extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'custom_pollers';

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
    public $fillable = [
        'name',
        'unique_id',
        'is_disabled',
        'is_table',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * Get related OIDS for this Custom Poller.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function oids()
    {
        return $this->hasMany(CustomPollerOid::class);
    }
}
