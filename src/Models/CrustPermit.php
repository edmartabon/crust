<?php

namespace Crust\Models;

use Illuminate\Database\Eloquent\Model;

class CrustPermit extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['permit_name', 'permit_code'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
