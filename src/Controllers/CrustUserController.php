<?php

namespace Crust\Controllers;

use Illuminate\Http\Request;
use Crust\Requests\CreateUser;
use Crust\Requests\UpdateUser;
use Crust\Contracts\HumanInterface;
use App\Http\Controllers\Controller;

class CrustUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(HumanInterface $human)
    {
        return $human->getHumanRaw()->paginate(10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Crust\Contracts\HumanInterface $human
     * @param  \Illuminate\Http\Request  $request
     * @param  \Crust\Requests\CreateUser $createUser
     * @return \Illuminate\Http\Response
     */
    public function store(HumanInterface $human, Request $request, CreateUser $createUser)
    {
        return $human->add($request->except('permit_codes'))
            ->modifyHumanRole($human->getValidPermit($request, 'role'))
            ->modifyHumanPermit($human->getValidatePermitCodes($request, 'permit'))
            ->modifyHumanBan($human->getValidatePermitCodes($request, 'ban'))
            ->get();        
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
        return $human->get($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param  \Crust\Contracts\HumanInterface $human
     * @return \Illuminate\Http\Response
     */
    public function edit($id, HumanInterface $human)
    {
         return $human->get($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Crust\Contracts\HumanInterface $human
     * @param  \Illuminate\Http\Request $request
     * @param  \Crust\Requests\UpdateUser $updateUser
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HumanInterface $human, Request $request, UpdateUser $updateUser, $id)
    {   
        return $human->modify($request->input(), $id)
            ->modifyHumanRole($human->getValidPermit($request, 'role'))
            ->modifyHumanPermit($human->getValidatePermitCodes($request, 'permit'))
            ->modifyHumanBan($human->getValidatePermitCodes($request, 'ban'))
            ->get();
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
        return $human->delete($id);
    }

}