<?php

namespace App\Http\Controllers\Forms;

use Illuminate\Http\Request;
use  App\Models\Forms\Country;
use App\Http\Controllers\Controller;
use App\Models\Manufacture\Manufacture;
use App\Http\Requests\ManufactureFormRequest;
class ManufacturesController extends Controller
{
    protected $manufacture, $countries;

    public function __construct(Manufacture $manufacture, Country $countries){
        $this->manufacture = $manufacture;
        $this->countries   = $countries; 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manufactures = $this->manufacture->all();
        return view('forms.manufactures.index',compact('manufactures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = $this->countries->selectCountries();

        return view('forms.manufactures.create',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManufactureFormRequest $request)
    {
        $data = $request->all();
        $data['user_created'] = auth()->user()->uuid;

        if($this->manufacture->create($data))
            return response()->json(['success'=>true,'msg'=>trans('application.record_created')],201);
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
    public function edit($uuid)
    {

        $countries = $this->countries->selectCountries();
        $manufacture = $this->manufacture->findOrFail($uuid);

        return view('forms.manufactures.edit',compact('manufacture','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ManufactureFormRequest $request, $uuid)
    {
        $manufacture = $this->manufacture->findOrFail($uuid);
        $data = $request->all();
        $data['user_updated'] = auth()->user()->uuid;
        $manufacture->fill($data);
        $manufacture->save();

        if($manufacture)
            return response()->json(['success'=>true,'msg'=>trans('application.record_updated')],201);
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
        $manufacture = $this->manufacture->findOrFail($uuid)->delete();
        if($manufacture){
            flash()->success(trans('application.record_deleted'));
            return redirect()->route('manufactures.index');
        }
        flash()->error(trans('application.record_failed'));
            return redirect()->route('manufactures.index');

    }
}
