<?php

namespace App\Http\Controllers\Forms;

use App\Models\Farms\{Farmer,Farm};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Forms\{Race, Gender,Country};
use App\Http\Requests\Shared\FarmerFormRequest;

class FarmersController extends Controller
{   
    protected $farmer, $countries, $gender, $race, $farm;

    public function __construct(Farmer $farmer, Country $countries, Race $race, Gender $gender, Farm $farm){
        $this->race = $race;
        $this->farm = $farm;
        $this->gender = $gender;
        $this->farmer = $farmer;
        $this->countries = $countries;
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $farmers = $this->farmer->all();

        return view('forms.farmers.index',compact('farmers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $races     = $this->race->race();
        $gender    = $this->gender->gender(); 
        $countries = $this->countries->selectCountries();
        return view('forms.farmers.create',compact('countries','races','gender'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FarmerFormRequest $request)
    {
        $data = $request->all();
        $data['country_id'] = 193;
        $data['user_created'] = auth()->user()->uuid;

        $farmer = $this->farmer->create($data);

        if($farmer)
            return response()->json(['data'=>$farmer,'success'=>true,'msg'=>trans('application.record_created')],201);
        else
            return response()->json(['success'=>false,'msg'=>trans('application.record_creation_failed')],503);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $farmer    = $this->farmer->with('farm')->findOrFail($id);
        return view('forms.farmers.show',compact('farmer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $races     = $this->race->race();
        $gender    = $this->gender->gender(); 
        $countries = $this->countries->selectCountries();
        $farmer    = $this->farmer->findOrFail($id);

        return view('forms.farmers.edit',compact('races','gender','farmer','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FarmerFormRequest $request, $uuid)
    {
        $farmer = $this->farmer->findOrFail($uuid);
        $data   = $request->all();
        $data['user_updated'] = auth()->user()->uuid;

        $farmer->fill($data)->save();

        if($farmer)
            return response()->json(['data'=>$farmer,'success'=>true,'msg'=>trans('application.record_created')],201);
        else
            return response()->json(['success'=>false,'msg'=>trans('application.record_creation_failed')],503);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $farmer = $this->farmer->findOrFail($uuid);
        $farmer->fill(['user_deleted'=>auth()->user()->uuid])->save();
        $farmer->delete();

        return redirect()->route('farmers.index');

    }

    public function farm($uuid){

        $farms =  $this->farm->farm();
        $farmer = $this->farmer->findOrFail($uuid);

        return view('forms.farmers.partials.farms',compact('farms','farmer'));
    }

    public function addFarms(Request $request, $uuid){
        $farmer = $this->farmer->findOrFail($uuid);
        $farmer->farm()->syncWithoutDetaching([$request->get('farmer_id')]);

        return response()->json(['success'=>true,'msg'=>trans('application.record_created')],201);
    }
}
