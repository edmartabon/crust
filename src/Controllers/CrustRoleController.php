<?php

namespace Crust\Controllers;

use Illuminate\Http\Request;
use Crust\Requests\CreateRole;
use Crust\Contracts\HumanInterface;
use App\Http\Controllers\Controller;

class CrustRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Crust\Contracts\HumanInterface $human
     * @return \Illuminate\Http\Response
     */
    public function index(HumanInterface $human)
    {
        return $human->getHumanRoleRaw()->paginate(10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Crust\Contracts\HumanInterface $human
     * @return \Illuminate\Http\Response
     */
    public function create(HumanInterface $human)
    {
        return $human->getAllRole();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Crust\Contracts\HumanInterface $human
     * @param  \Illuminate\Http\Request  $request
     * @param  \Crust\Requests\CreateRole $createRole
     * @return \Illuminate\Http\Response
     */
    public function store(HumanInterface $human, Request $request, CreateRole $createRole)
    {
        return $human->addRole([
            'role_name'    => $request['role_name'],
            'permit_codes' => $human->getValidatePermitCodes($request, 'permit')
        ])->getRole();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  \Crust\Contracts\HumanInterface $human
     * @return \Illuminate\Http\Response
     */
    public function show($id, HumanInterface $human)
    {
        return $human->getRole($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Crust\Contracts\HumanInterface $human
     * @param  \Illuminate\Http\Request $request
     * @param  \Crust\Requests\CreateRole $createRole
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HumanInterface $human, Request $request, CreateRole $createRole, $id)
    {
        return $human->modifyRole([
            'role_name'    => $request['role_name'],
            'permit_codes' => $human->getValidatePermitCodes($request, 'permit')
        ], $id)->getRole();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Crust\Contracts\HumanInterface $human
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(HumanInterface $human, $id)
    {
        return $human->deleteRole($id);
    }

    

}