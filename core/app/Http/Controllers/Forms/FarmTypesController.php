<?php

namespace App\Http\Controllers\Shared;

use Illuminate\Http\Request;
use App\Models\Farms\FarmType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Shared\FTypeFormRequest;
use App\Http\Controllers\Shared\HelperController as Helper;

class FarmTypesController extends Controller
{
    protected $farmtype,$helper;


    public function __construct(Helper $helper, FarmType $farmtype){
        $this->helper = $helper;
        $this->farmtype = $farmtype;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $farmtypes = $this->farmtype->all();

        return response()->json(['data'=>$farmtypes],201);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FTypeFormRequest $request)
    {
        $data = [
            'name'  => $request->get('name'),
            'user_created'=>$this->helper->user()
        ];

        $farmtype = $this->farmtype->create($data);


        if($farmtype)
            return response()->json(['data'=>$farmtype,'success'=>true,'msg'=>trans('application.record_created')],201);
        else
            return response()->json(['success'=>false,'msg'=>trans('application.record_failed')],503);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FTypeFormRequest $request, $id)
    {
        $farmtype = $this->farmtype->findOrfail($uuid);

        $data = [
            'name'  => $request->get('name'),
            'user_updated'=>$this->helper->user()
            ];

        $farmtype->fill($data)->save();


        if($farmtype)
            return response()->json(['data'=>$farmtype,'success'=>true,'msg'=>trans('application.record_updated')],201);
        else
            return response()->json(['success'=>false,'msg'=>trans('application.record_failed')],503);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $farmtype = $this->farmtype->findOrfail($uuid);
        $farmtype->fill(['user_deleted'=>$this->helper->user()])->save();
        $farmtype->delete();

        if($farmtype)
            return response()->json(['success'=>true,'msg'=>trans('application.record_deleted')],201);
        else
            return response()->json(['success'=>false,'msg'=>trans('application.delete_failed')],503);
    }
}
