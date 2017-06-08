<?php

namespace App\Http\Controllers\Shared;


use App\Models\Shared\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Shared\ClientFormRequest;

class ClientsController extends Controller
{
    protected $client, $helper;

    public function __construct(Client $client){
        $this->client = $client;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = $this->client->all();
        return response()->json(['data'=>$clients],201);
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
    public function store(ClientFormRequest $request)
    {   
        
        $data = $request->all();
        $data['user_created'] = auth()->user()->uuid;

        $client = $this->client->create($data);

        if($client)
            return response()->json(['data'=>$client,'success'=>true,'msg'=>trans('application.record_created')],201);
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
    public function update(Request $request, $uuid)
    {
        $client = $this->client->findOrFail($uuid);
        $data   = $request->all();
        $data['user_updated'] = auth()->user()->uuid;

        $client->fill($data)->save();

        if($client)
            return response()->json(['data'=>$client,'success'=>true],201);
        else
            return response()->json(['success'=>false,'msg'=>trans('application.record_failed')],401);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = $this->client->find($id);
        $client->fill(['user_deletd'=>$this->helper->user()])->save();
        $client->delete();

        if($client)
            return response()->json(['msg'=>trans('application.reocord_deleted'),'success'=>false],201);
        else
            return response()->json(['success'=>false,'msg'=>trans('application.delete_failed')],503);
    }
}
