<?php

namespace Crust\Modules;

use Crust\Models\CrustPermit;
use Crust\Models\CrustRole;

trait Permission
{
    public $role;

    public $permit;

    /**
     * Get user's information by id.
     *
     * @param int $userid
     *
     * @return array
     */
    public function getRole($roleId = null)
    {
        if (is_null($roleId)) {
            $roleId = $this->role->id;
        }

        return CrustRole::find($roleId)->toArray();
    }

    /**
     * Get all registered users.
     *
     * @return array
     */
    public function getAllRole()
    {
        return CrustRole::all();
    }

    /**
     * Get user's information by id.
     *
     * @param int $userid
     *
     * @return array
     */
    public function getPermit($permit = null)
    {
        if (is_null($permit)) {
            $permit = $this->permit->id;
        }

        return CrustPermit::find($permit)->toArray();
    }

    /**
     * Get all registered permit.
     *
     * @return array
     */
    public function getAllPermit()
    {
        return CrustPermit::all();
    }

    /**
     * Add new role.
     *
     * @param array $credential
     *
     * @return $this
     */
    public function addRole(array $credential)
    {
        $role = new CrustRole($credential);
        $role->save();

        $this->role = $role;

        return $this;
    }

    /**
     * Modify user permit codes.
     *
     * @param array $credential
     * @param int   $roleId
     *
     * @return $this
     */
    public function modifyRole(array $credential, $roleId = null)
    {
        if ($this->role && is_null($roleId)) {
            $roleId = $this->role;
        }
        $role = CrustRole::find($roleId);

        foreach ($credential as $name => $value) {
            $role->$name = $value;
        }
        $role->save();
        $this->role = $role;

        return $this;
    }

    /**
     * Delete role.
     *
     * @return void
     */
    public function deleteRole($roleId)
    {
        CrustRole::destroy($roleId);
    }

    /**
     * Add new permit.
     *
     * @param array $credential
     *
     * @return $this
     */
    public function addPermit(array $credential)
    {
        $permit = new CrustPermit($credential);
        $permit->save();

        $this->permit = $permit;

        return $this;
    }

    /**
     * Modify user permit codes.
     *
     * @param array $credential
     * @param int   $permitId
     *
     * @return $this
     */
    public function modifyPermit(array $credential, $permitId = null)
    {
        if ($this->permit && is_null($permitId)) {
            $permitId = $this->permit;
        }
        $permit = CrustPermit::find($permitId);

        foreach ($credential as $name => $value) {
            $permit->$name = $value;
        }
        $permit->save();
        $this->permit = $permit;

        return $this;
    }

    /**
     * Delete permit.
     *
     * @return void
     */
    public function deletePermit($permitId)
    {
        CrustPermit::destroy($permitId);
    }

    public function getValidatePermitCodes($request, $type)
    {
        $permitCode = $this->getValidPermit($request, $type);

        return $this->getPermitCode($permitCode);
    }

    /**
     * Check if permit is available.
     *
     * @param \Illuminate\Http\Request $request
     * @param string                   $type
     *
     * @return array
     */
    public function getValidPermit($request, $type)
    {
        if (!is_null($request['permit_codes'])) {
            if (isset($request['permit_codes'][$type])) {
                return $request['permit_codes'][$type];
            }
        }

        return [];
    }

    /**
     * Get item from permit code.
     *
     * @param array $permitCode
     *
     * @return array
     */
    private function getPermitCode(array $permitCode)
    {
        $permits = [];
        foreach ($permitCode as $permit) {
            if (!is_array($permit)) {
                array_push($permits, $permit);
            } else {
                array_push($permits, $permit['permit_code']);
            }
        }

        return $permits;
    }
}
