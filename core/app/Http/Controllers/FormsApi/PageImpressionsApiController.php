<?php

namespace App\Http\Controllers\FormsApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Shared\PageImpressionFormRequest;
use App\Models\Forms\PageImpression;

class PageImpressionsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'List all page impressions here';
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

    /**    * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageImpressionFormRequest $request)
    {
        $impression = PageImpression::create([
            'date'              => $request->get('date'),
            'user_uuid'         => $request->get('user_uuid'),
            'application_uuid'  => $request->get('application_uuid'),
            'device_uuid'        => $request->get('device_uuid'),
            'node_uuid'         => $request->get('node_uuid')
        ]);


        if ($impression)
            return response()->json(['data'=>$impression,'success'=>true,'msg'=>trans('application.record_created')],201);
        else
           return response()->json(['success'=>false,'msg'=>trans('application.record_creation_failed')],404);
        
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
