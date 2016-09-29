<?php

namespace Crust\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'password', 'email', 'permit_codes', 'first_name', 'last_name'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * Set the user's password to hash.
     *
     * @param string $value
     *
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = \Hash::make($value);
    }

    /**
     * Set the user's username.
     *
     * @param string $value
     *
     * @return void
     */
    public function setUsernameAttribute($value)
    {
        $this->attributes['username'] = strtolower($value);
    }

    /**
     * Set the user's permit code.
     *
     * @param string $value
     *
     * @return void
     */
    public function setPermitCodesAttribute($value)
    {
        $this->attributes['permit_codes'] = strtolower(json_encode($value));
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
        return $this->getPermitCodesFormat($value);
    }

    /**
     * Check if user permit code is null.
     *
     * @param string $value
     *
     * @return object
     */
    private function getPermitCodesFormat($value)
    {
        $defaultFormat = json_decode($this->permitCodesList());

        if (!is_null($value)) {
            $permitCodes = json_decode(strtolower($value));
        } else {
            $permitCodes = $defaultFormat;
        }

        if (json_last_error() == JSON_ERROR_NONE) {
            return $permitCodes;
        }

        return $defaultFormat;
    }

    /**
     * Get the default permission item.
     *
     * @return string
     */
    private function permitCodesList()
    {
        return strtolower(json_encode([
            'role'   => [],
            'permit' => [],
            'ban'    => [],
        ]));
    }
}
