<?php

namespace Crust\Controllers;

use App\Http\Controllers\Controller;
use Crust\Contracts\HumanInterface;
use Crust\Requests\CreatePermission;
use Illuminate\Http\Request;

class CrustPermitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Crust\Contracts\HumanInterface $human
     *
     * @return \Illuminate\Http\Response
     */
    public function index(HumanInterface $human)
    {
        return $human->getHumanPermitRaw()->paginate(10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \Crust\Contracts\HumanInterface $human
     *
     * @return \Illuminate\Http\Response
     */
    public function create(HumanInterface $human)
    {
        return $human->getAllPermit();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Crust\Contracts\HumanInterface            $human
     * @param \Illuminate\Http\Request                   $request
     * @param \Cactus\App\Http\Requests\CreatePermission $createPermission
     *
     * @return \Illuminate\Http\Response
     */
    public function store(HumanInterface $human, Request $request, CreatePermission $createPermission)
    {
        return $human->addPermit([
            'permit_name' => $request['permit_name'],
            'permit_code' => $request['permit_code'],
        ])->getPermit();
    }

    /**
     * Display the specified resource.
     *
     * @param int                             $id
     * @param \Crust\Contracts\HumanInterface $human
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id, HumanInterface $human)
    {
        return $human->getPermit($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Crust\Contracts\HumanInterface            $human
     * @param \Illuminate\Http\Request                   $request
     * @param \Cactus\App\Http\Requests\CreatePermission $createPermission
     * @param int                                        $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(HumanInterface $human, Request $request, CreatePermission $createPermission, $id)
    {
        return $human->modifyPermit([
            'permit_name' => $request['permit_name'],
            'permit_code' => $request['permit_code'],
        ], $id)->getPermit();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Crust\Contracts\HumanInterface $human
     * @param int                             $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(HumanInterface $human, $id)
    {
        return $human->deletePermit($id);
    }
}
