<?php

namespace Crust\Controllers;

class CrustController
{

	public function index()
	{
		return view("crust::pages.crust");
	}

	public function dashboard()
	{
		return view("crust::pages.dashboard");
	}

	public function role()
	{
		return view("crust::pages.role");
	}

	public function modalRole()
	{
		return view("crust::modals.role");
	}

	public function modalRoleDelete()
	{
		return view("crust::modals.roledelete");
	}

	public function modalPermission()
	{
		return view('crust::modals.permission');
	}

	public function modalPermissionDelete()
	{
		return view('crust::modals.permissiondelete');
	}

	public function modalUserInfo()
	{
		return view("crust::modals.user-info");
	}

	public function modalUserDelete()
	{
		return view("crust::modals.user-delete");
	}

	public function modalSuccess()
	{
		return view("crust::modals.success");
	}

	public function modalWaiting()
	{
		return view("crust::modals.waiting");
	}

}