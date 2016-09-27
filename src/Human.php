<?php

namespace Crust;

use Auth;
use Config;
use Request;
use Redirect;
use Crust\Models\Users;
use Crust\Models\CrustRole;
use Crust\Models\CrustPermit;
use Crust\Modules\Permission;
use Crust\Contracts\HumanInterface;

class Human implements HumanInterface
{
	
	use Permission;

	/**
	 * Get the last executed user
	 */
	public $user;

	/**
	 * Set new auth provider a new model
	 */
	function __construct()
	{
		Config::set(['auth.providers.users.model' => 'Crust\Models\Users']);
	}

	/**
	 * Create new user
	 *
	 * @param array $credential
	 * @return $this
	 */
	public function add(array $credential)
	{
		$user = Users::create($credential);
		$user->save();

		$this->user = $user;
		return $this;
	}

	/**
	 * Modify user information
	 *
	 * @param array $credential
	 * @param integer $userId
	 * @return object
	 */
	public function modify(array $credential, $userId = null)
	{
		if (is_null($userId)) $userId = $this->user->id;

		$user = Users::find($userId);

		foreach($credential as $field => $value) {
			if ($field !== 'permit_codes') $user->$field = $value;
		}
		$user->save();

		$this->user = $user;
		return $this;
	}

	/**
	 * Get user's information by id
	 *
	 * @param integer $userid
	 * @return array
	 */
	public function get($userId = null)
	{
		if (is_null($userId)) $userId = $this->user->id;

		return Users::find($userId)->toArray();
	}

	/**
	 * Get all registered users
	 *
	 * @return array
	 */
	public function getAll()
	{
		return Users::all();
	}

	/**
	 * return the user model
	 *
	 * @return Crust\Models\Users
	 */
	public function getHumanRaw()
	{
		return Users::query();
	}

	/**
	 * Get the current user log
	 *
	 * @return array
	 */
	public function currentHuman()
	{
		return Auth::user();
	}

	/**
	 * Delete user 
	 *
	 * @param integer $userId
	 * @return void
	 */
	public function delete($userId)
	{
		Users::destroy($userId);
	}

	/**
	 * Get user permit codes
	 *
	 * @param integer $userId
	 * @return object
	 */
	public function getHumanPermitCodes($userId = null)
	{
		$user = $this->currentHuman();
		if (!is_null($userId)) $user = Users::find($userId);

		if ($user && !is_null($user->permit_codes)) {
			return $user->permit_codes;
		}
		return false;
	}

	/**
	 * Get user role
	 * 
	 * @param integer $userId
	 * @return bool
	 */
	public function getHumanRole($userId = null)
	{
		if (is_null($userId)) {
			if ($this->user) $userId = $this->user->id;
			else if ($this->currentHuman()) $userId = $this->currentHuman()->id;
			else return [];
		}

		if ($userPermitCodes = $this->getHumanPermitCodes($userId)) {
			if (isset($userPermitCodes->role)) {
				return $userPermitCodes->role;
			}
			return [];
		}
		else return [];
	}

	/**
	 * Modify user permission role
	 * 
	 * @param array $credential
	 * @param integer $userId
	 * @return object
	 */
	public function modifyHumanRole($credential, $userId = null)
	{	
		return $this->updateUserPermission($credential, 'role', $userId);
	}

	/**
	 * return the role model
	 *
	 * @return Crust\Models\CrustRole
	 */
	public function getHumanRoleRaw()
	{
		return CrustRole::query();
	}

	/**
	 * Get user permit
	 * 
	 * @param integer $userId
	 * @return bool
	 */
	public function getHumanPermit($userId = null)
	{
		if (is_null($userId)) {
			if ($this->user) $userId = $this->user->id;
			else if ($this->currentHuman()) $userId = $this->currentHuman()->id;
			else return [];
		}

		if ($userPermitCodes = $this->getHumanPermitCodes($userId)) {
			if (isset($userPermitCodes->permit)) {
				return $userPermitCodes->permit;
			}
			return [];
		}
		else return [];
	}

	/**
	 * Modify user permission permit
	 * 
	 * @param array $credential
	 * @param integer $userId
	 * @return object
	 */
	public function modifyHumanPermit($credential, $userId = null)
	{
		return $this->updateUserPermission($credential, 'permit', $userId);
	}

	/**
	 * return the permit model
	 *
	 * @return Crust\Models\CrustPermit
	 */
	public function getHumanPermitRaw()
	{
		return CrustPermit::query();
	}

	/**
	 * Get user permit
	 * 
	 * @param integer $userId
	 * @return bool
	 */
	public function getHumanBan($userId = null)
	{
		if (is_null($userId)) {
			if ($this->user) $userId = $this->user->id;
			else if ($this->currentHuman()) $userId = $this->currentHuman()->id;
			else return [];
		}
		
		if ($userPermitCodes = $this->getHumanPermitCodes($userId)) {
			if (isset($userPermitCodes->ban)) {
				return $userPermitCodes->ban;
			}
			return [];
		}
		else return [];
	}

	/**
	 * Modify user permission ban
	 * 
	 * @param array $credential
	 * @param integer $userId
	 * @return object
	 */
	public function modifyHumanBan($credential, $userId = null)
	{
		return $this->updateUserPermission($credential, 'ban', $userId);
	}

	/**
	 * Update user's permission
	 *
	 * @param array $credential
	 * @param string $type
	 * @param null $userId
	 * @return object
	 */
	private function updateUserPermission($credential, $type, $userId = null)
	{

		if (is_null($userId)) $userId = $this->user->id;

		$user = Users::find($userId);
		$user->permit_codes = $this->setPermissionItem($user, $type, $credential);
		$user->save();

		$this->user = $user;
		return $this;
	}

	/**
	 * Get the main item for permission
	 * 
	 * @param object $user
	 * @param string $type
	 * @param array  $credential
	 * @return array
	 */
	private function setPermissionItem($user, $type, $credential)
	{	
		$items = [];
		foreach($user->permit_codes as $item => $value) {
			$items[$item] = $value;
		}
		$items[$type] = $credential;
		return $items;
	}

	/**
	 * Attempt to log user
	 *
	 * @param array $credential
	 * @return bool
	 */
	public function auth(array $credential, $return = true)
	{
		if ($this->isAuth()) {
			if (!$return) return true;
			return $this->moveHuman();
		}

		if (Auth::attempt($credential)) {
			if (!$return) return true;
		}
		if (!$return) return true;
		return $this->moveAuthHuman();
	}

	/**
	 * Redirect user to designated page
	 *
	 * @return response
	 */
	public function moveHuman()
	{
		return Redirect::to($this->getRedirect());
	}

	/**
	 * Check if ajax request and send response
	 *
	 * @return response
	 */
	private function moveAuthHuman()
	{
		if (Request::ajax()) return $this->moveAuthHumanAjax();
		return $this->moveAuthHumanRedirect();
	}

	/**
	 * 
	 */
	private function moveAuthHumanRedirect()
	{
		if (Auth::check()) {
			return Redirect::to($this->getRedirect());
		}

		return Redirect::back()->withErrors([
    		'Username or password incorrect.'
    	]);
	}

	/**
	 * Return json response if authentication
	 * request is ajax
	 *
	 * @return array
	 */
	private function moveAuthHumanAjax()
	{
		if (Auth::check()) {
			return [
				'success'  => true,
				'redirect' => $this->getRedirect()
			];
		}
		return ['success'  => false];
	}

	/**
	 * Check if user is authenticated
	 *
	 * @return bool
	 */
	public function isAuth()
	{
		if (Auth::check()) return true;
		return false;
	}

	/**
	 * Destroy user's session
	 * 
	 * @return void
	 */
	public function logout()
	{
		Auth::logout();
		return $this->moveHuman();
	}

	/**
	 * Get redirect path if user successfully login
	 *
	 * @return string
	 */
	public function getRedirect()
	{	
		if ($this->getHumanRole() && $this->getConfigRedirect()) {
			foreach($this->getConfigRedirect() as $role => $redirect) {
				if (in_array(strtolower($role), $this->getHumanRole())) {
					return $redirect;
				}
			}
			return '/';
		}	
		return '/';
	}

	/**
	 * Get config setting for redirect
	 *
	 * @return bool
	 */
	private function getConfigRedirect()
	{
		if (!is_null($redirect = Config::get('crust.redirect'))) {
			return $redirect;
		} 
		return false;
	}
}