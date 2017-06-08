<?php

namespace App\Http\Controllers\Shared;

use App\Models\Ngos\NgoType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Shared\NTypeFormRequest;
use App\Http\Controllers\Shared\HelperController as Helper;

class NgoTypesController extends Controller
{
    protected $helper, $ngotype;

    public function __construct(Helper $helper, NgoType $ngotype){
        $this->helper  = $helper;
        $this->ngotype = $ngotype;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ngotypes = $this->ngotype->all();

        return response()->json(['data'=>$ngotypes],201);
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
    public function store(NTypeFormRequest $request)
    {
        $data = $request->all();
        $data['user_created'] = $this->helper->user();

        $ngotype = $this->ngotype->create($data);

        if($ngotype)
            return response()->json(['data'=>$ngotype,'success'=>true,'msg'=>trans('application.record_created')],201);
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
    public function update(NTypeFormRequest $request, $uuid)
    {
        $ngotype = $this->ngotype->findOrFail($uuid);

        $data = [
            'name'  =>$request->get('name'),
            'user_updated' =>$this->helper->user()
        ];

        $ngotype->fill($data)->save();

        if($ngotype)
            return response()->json(['data'=>$ngotype,'success'=>true,'msg'=>trans('application.record_updated')],201);
        else
            return response()->json(['success'=>false,'msg'=>trans('application.record_failed')],500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ngotype = $this->ngotype->findOrFail($uuid);
        $ngotype->fill(['user_deleted'=>$ngotype])->save();
        $ngotype->delete();

        if($ngotype)
            return response()->json(['success'=>true,'msg'=>trans('application.record_deleted')],201);
        else
            return response()->json(['success'=>false,'msg'=>trans('application.record_failed')],500);

    }
}
