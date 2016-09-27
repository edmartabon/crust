<?php

namespace Crust\Contracts;

interface HumanInterface
{
	/**
	 * Get user's information by id
	 *
	 * @param integer $userid
	 * @return array
	 */
	public function add(array $credential);

	/**
	 * Modify user information
	 *
	 * @param array $credential
	 * @param integer $userId
	 * @return object
	 */
	public function modify(array $credential, $userId = null);

	/**
	 * Get all registered users
	 *
	 * @return array
	 */
	public function get($userId = null);

	/**
	 * Generate default format for user permission
	 *
	 * @return string
	 */
	public function getAll();

	/**
	 * return the user model
	 *
	 * @return Crust\Models\Users
	 */
	public function getHumanRaw();

	/**
	 * Get the current user log
	 *
	 * @return array
	 */
	public function currentHuman();
	
	/**
	 * Delete user 
	 *
	 * @param integer $userId
	 * @return void
	 */
	public function delete($userId);
	
	/**
	 * Get user permit codes
	 *
	 * @param integer $userId
	 * @return object
	 */
	public function getHumanPermitCodes($userId = null);

	/**
	 * Get user role
	 * 
	 * @param integer $userId
	 * @return bool
	 */
	public function getHumanRole($userId = null);

	/**
	 * Modify user permission role
	 * 
	 * @param array $credential
	 * @param integer $userId
	 * @return object
	 */
	public function modifyHumanRole($credential, $userId = null);

	/**
	 * return the permit model
	 *
	 * @return Crust\Models\CrustPermit
	 */
	public function getHumanPermitRaw();

	/**
	 * return the role model
	 *
	 * @return Crust\Models\CrustRole
	 */
	public function getHumanRoleRaw();

	/**
	 * Get user permit
	 * 
	 * @param integer $userId
	 * @return bool
	 */
	public function getHumanPermit($userId = null);

	/**
	 * Modify user permission permit
	 * 
	 * @param array $credential
	 * @param integer $userId
	 * @return object
	 */
	public function modifyHumanPermit($credential, $userId = null);

	/**
	 * Get user permit
	 * 
	 * @param integer $userId
	 * @return bool
	 */
	public function getHumanBan($userId = null);

	/**
	 * Modify user permission ban
	 * 
	 * @param array $credential
	 * @param integer $userId
	 * @return object
	 */
	public function modifyHumanBan($credential, $userId = null);

	/**
	 * Get user's information by id
	 *
	 * @param integer $roleId
	 * @return array
	 */
	public function getRole($roleId = null);


	/**
	 * Get user's information by id
	 *
	 * @param integer $permitId
	 * @return array
	 */
	public function getPermit($permit = null);

	/**
	 * Get all registered roles
	 *
	 * @return array
	 */
	public function getAllRole();

	/**
	 * Add new role 
	 *
	 * @param array $credentials
	 * @return $this
	 */
	public function addRole(array $credentials);

	/**
	 * Modify user permit codes 
	 *
	 * @param array $credential
	 * @param integer $roleId
	 * @return $this
	 */
	public function modifyRole(array $credential, $roleId = null);

	/**
	 * Delete role
	 *
	 * @return void
	 */
	public function deleteRole($roleId);

	/**
	 * Add new permit
	 *
	 * @param array $credential
	 * @return $this
	 */
	public function addPermit(array $credential);

	/**
	 * Modify user permit codes 
	 *
	 * @param array $credential
	 * @param integer $permitId
	 * @return $this
	 */
	public function modifyPermit(array $credential, $permitId = null);
	
	/**
	 * Delete permit
	 *
	 * @return void
	 */
	public function deletePermit($permitId);
	/**
	 * Attempt to log user
	 *
	 * @param array $credential
	 * @return bool
	 */
	public function auth(array $credential, $return = true);

	/**
	 * Check if user is authenticated
	 *
	 * @return bool
	 */
	public function isAuth();

	/**
	 * Redirect user to designated page
	 *
	 * @return response
	 */
	public function moveHuman();

	/**
	 * Destroy user's session
	 * 
	 * @return void
	 */
	public function logout();
}