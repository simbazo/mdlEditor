<?php

namespace App\Http\Controllers\Shared;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ngos\NgoArea as Area;
use App\Http\Requests\Shared\NAreaFormRequest;
use App\Http\Controllers\Shared\HelperController as Helper;

class NgoAreasController extends Controller
{
    protected $area,$helper;

    public function __construct(Helper $helper, Area $area){
        $this->area = $area;
        $this->helper  = $helper;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = $this->area->all();

        return response()->json(['data'=>$areas],201);
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
    public function store(NAreaFormRequest $request)
    {
        $data = [
            'name'  => $request->get('name'),
            'user_created'=>$this->helper->user()
        ];

        $area = $this->area->create($data);


        if($area)
            return response()->json(['data'=>$area,'success'=>true,'msg'=>trans('application.record_created')],201);
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
    public function update(NAreaFormRequest $request, $uuid)
    {   
        $area = $this->area->findOrfail($uuid);

        $data = [
            'name'  => $request->get('name'),
            'user_updated'=>$this->helper->user()
            ];

        $area->fill($data)->save();


        if($area)
            return response()->json(['data'=>$area,'success'=>true,'msg'=>trans('application.record_updated')],201);
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
        $area = $this->area->findOrfail($uuid);
        $area->fill(['user_deleted'=>$this->helper->user()])->save();
        $area->delete();

        if($area)
            return response()->json(['success'=>true,'msg'=>trans('application.record_deleted')],201);
        else
            return response()->json(['success'=>false,'msg'=>trans('application.delete_failed')],503);
    }
}
