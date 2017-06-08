<?php

namespace App\Http\Controllers\Shared;

use Illuminate\Http\Request;
use App\Models\Shared\Gender;
use App\Http\Controllers\Controller;
use App\Http\Requests\Shared\GenderFormRequest;
use App\Http\Controllers\Shared\HelperController as Helper;

class GenderController extends Controller
{
    protected $gender, $helper;

    public function __construct(Gender $gender, Helper $helper){
        $this->helper = $helper;
        $this->gender = $gender;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gender = $this->gender->all();

        return response()->json(['data'=>$gender],201);
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
    public function store(GenderFormRequest $request)
    {
        $data = [
            'name'  => $request->get('name'),
            'user_created'=>$this->helper->user()
        ];

        $gender = $this->gender->create($data);


        if($gender)
            return response()->json(['data'=>$gender,'success'=>true,'msg'=>trans('application.record_created')],201);
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
    public function update(GenderFormRequest $request, $id)
    {
        $gender = $this->gender->findOrfail($uuid);

        $data = [
            'name'  => $request->get('name'),
            'user_updated'=>$this->helper->user()
            ];

        $gender->fill($data)->save();


        if($gender)
            return response()->json(['data'=>$gender,'success'=>true,'msg'=>trans('application.record_updated')],201);
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
        $gender = $this->gender->findOrfail($uuid);
        $gender->fill(['user_deleted'=>$this->helper->user()])->save();
        $gender->delete();

        if($gender)
            return response()->json(['success'=>true,'msg'=>trans('application.record_deleted')],201);
        else
            return response()->json(['success'=>false,'msg'=>trans('application.delete_failed')],503);
    }
}
