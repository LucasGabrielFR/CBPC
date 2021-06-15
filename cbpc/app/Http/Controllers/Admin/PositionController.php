<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{

    protected $repository;

    public function __construct(Position $posicao){
        $this->repository = $posicao;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posicoes = $this->repository->all();
        return view('admin.pages.posicoes.index',compact('posicoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posicoes = $this->repository->all();
        return view('admin.pages.posicoes.create');
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
        return redirect()->route('posicoes.index');
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
        $posicao = $this->repository->where('id',$id)->first();

        if(!$posicao){
            return redirect()->back();
        }else{
            return view('admin.pages.posicoes.edit',[
                'posicao' => $posicao
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
        $posicao = $this->repository->where('id',$id)->first();

        if(!$posicao){
            return redirect()->back();
        }else{
            $posicao->update($request->all());
            return redirect()->route('posicoes.index');
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
        $posicao = $this->repository->where('id',$id)->first();

        if(!$posicao){
            return redirect()->back();
        }else{
            $posicao->delete();

            return redirect()->route('posicoes.index');
        }
    }
}
