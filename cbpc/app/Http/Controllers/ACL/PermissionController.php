<?php

namespace App\Http\Controllers\ACL;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    protected $repository;

    public function __construct(Permission $permission){
        $this->repository = $permission;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = $this->repository->all();
        return view('admin.pages.permissoes.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = $this->repository->all();
        return view('admin.pages.permissoes.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->repository->create($request->all());
        return redirect()->route('permissoes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = $this->repository->where('id',$id)->first();

        if(!$permission){
            return redirect()->back();
        }else{
            return view('admin.pages.permissoes.edit',[
                'permission' => $permission
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $permission = $this->repository->where('id',$id)->first();

        if(!$permission){
            return redirect()->back();
        }else{
            $permission->update($request->all());
            return redirect()->route('permissoes.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = $this->repository->where('id',$id)->first();

        if(!$permission){
            return redirect()->back();
        }else{
            $permission->delete();

            return redirect()->route('permissoes.index');
        }
    }
}
