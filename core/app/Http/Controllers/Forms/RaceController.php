<?php

namespace App\Http\Controllers\Shared;

use App\Models\Shared\Race;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Shared\RaceFormRequest;
use App\Http\Controllers\Shared\HelperController as Helper;

class RaceController extends Controller
{   
    protected $helper, $race;

    public function __construct(Race $race, Helper $helper){
        $this->race     = $race;
        $this->helper   = $helper;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $race = $this->race->all();
        return response()->json(['data'=>$race],201);
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
    public function store(RaceFormRequest $request)
    {
        $data = [
            'name'  => $request->get('name'),
            'user_created'=> $this->helper->user()
        ];

        $race = $this->race->create($data);

        if($race)
            return response()->json(['data'=>$race,'success'=>true,'msg'=>trans('application.record_created')],201);
        else
            return response()->json(['success'=>true,'msg'=>trans('application.record_failed')],503);
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
    public function update(RaceFormRequest $request, $uuid)
    {
        $race = $this->race->findOrFail($uuid);

        $data = [
            'name'  => $request->get('name'),
            'user_created' => $this->helper->user()
        ];

        $race->fill($data)->save();

        if($race)
            return response()->json(['data'=>$data,'success'=>true,'msg'=>trans('application.record_created')],201);
        else
            return response()->json(['success'=>false,'msg'=>trans('application.record_failed')],503);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $race = $this->race->findOrFail($uuid);
        $race->fill(['user_deleted'])->save();
        $race->delete();

        if($race)
            return response()->json(['success'=>true,'msg'=>trans('application.record_deleted')],201);
        else
            return response()->json(['success'=>false,'msg'=>trans('application.delete_failed')],503);
    }
}
