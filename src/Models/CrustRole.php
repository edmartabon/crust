<?php

namespace Crust\Models;

use Illuminate\Database\Eloquent\Model;

class CrustRole extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['role_name', 'permit_codes'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Set the user's permit code.
     *
     * @param string $value
     *
     * @return void
     */
    public function setPermitCodesAttribute($value)
    {
        $this->attributes['permit_codes'] = strtolower(json_encode(['permit' => $value]));
    }

    /**
     * Get the user's permit code.
     *
     * @param string $value
     *
     * @return object
     */
    public function getPermitCodesAttribute($value)
    {
        return (is_null($value)) ? json_decode(json_encode(['permit' => []])) : json_decode(strtolower($value));
    }
}
