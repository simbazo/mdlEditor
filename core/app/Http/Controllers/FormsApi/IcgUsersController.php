<?php

namespace App\Http\Controllers\FormsApi;

use App\Models\ICG\IcgUser;
use Illuminate\Http\Request;
use App\Models\ICG\IcgActivation;
use App\Events\IcgUserRegistered;
use App\Http\Controllers\Controller;
use App\Http\Requests\IcgFormRequest;

class IcgUsersController extends Controller
{
    protected $icg;

    public function __construct(IcgUser $icg){
        $this->icg = $icg;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $icg = $this->icg->all();

        return response()->json([
            'data'  =>$icg
        ],201);
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
    public function store(IcgFormRequest $request)
    {
        $icg = new IcgUser;
        $icg->first_name    = $request->get('first_name');
        $icg->last_name     = $request->get('last_name');
        $icg->email         = $request->get('email');
        $icg->sex           = $request->get('sex');
        $icg->dob           = $request->get('dob');
        $icg->role          = $request->get('role');
        //$icg->pin           = mt_rand(100000, 999999);
        $icg->device_id     = $request->get('device_id');
        $icg->app_id        = $request->get('app_id');
        $icg->save();

        $pin  =  $icg->ActivationToken()->create([
                'token' => str_random(128),
                'pin'   => mt_rand(100000, 999999)
            ]);

     if($icg){
        event(new IcgUserRegistered($icg));
        return response()->json([
            'data'  =>$icg,
            'pin'   =>$pin,
            'succes'=>true,
            'msg'   =>trans('application.record_created')
        ],201);
     }else{
          return response()->json([
            'success'   =>false,
            'msg'       =>trans('application.record_failed')    
        ],503);
     }
      
}

public function pin($pin){
    $pin = IcgActivation::where('pin',$pin)->first();

    if(!count($pin)){
    return response()->json(['errors'=>"The OTP provided is incorrect!"],422);
  }

  $pin->user()->update([
    'active' =>true 
  ]);

  $pin->delete();

  return response()->json(['success'=>true,'msg'=>'Account Activated'],201);
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
        $icg = IcgUser::findOrFail($id);

        return response()->json([
            'data'  =>$icg
        ],201);
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
        $icg = IcgUser::findOrFail($id);
        $icg->first_name    = $request->get('first_name');
        $icg->last_name     = $request->get('last_name');
        $icg->email         = $request->get('email');
        $icg->sex           = $request->get('sex');
        $icg->dob           = $request->get('dob');
        $icg->role          = $request->get('role');
        $icg->save();

        if($icg)
            return response()->json([
                'data'      =>$icg,
                'success'   =>true,
                'msg'       =>trans('application.record_created')
            ],201);
        else
            return response()->json([
                'success'   =>false,
                'msg'       =>trans('application.record_failed')
            ],503);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $icg = IcgUser::findOrFail($id);
        $icg->delete();

        if($icg)
            return response()->json([
                'msg'   =>trans('application.record_deleted'),
                'success'=>true
            ],201);
        else
            return response()->json([
                'msg'   =>trans('application.record_failed'),
                'success'=>false
            ],503);
    }
}
