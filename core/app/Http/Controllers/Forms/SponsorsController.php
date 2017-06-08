<?php

namespace App\Http\Controllers\Forms;

use App\Models\Forms\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sponsors\{Sponsor,SponsorType};
use App\Http\Requests\Shared\SponsorFormRequest;

class SponsorsController extends Controller
{   
    protected $sponsor,$types, $countries;

    public function __construct(Sponsor $sponsor,SponsorType $types,Country $countries){
        $this->countries = $countries;
        $this->types   = $types; 
        $this->sponsor = $sponsor;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sponsors = $this->sponsor->all();

        return view('forms.sponsors.index',compact('sponsors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $types = $this->types->types();
        $countries = $this->countries->selectCountries();
        return view('forms.sponsors.create',compact('types','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SponsorFormRequest $request)
    {
        $data = $request->all();
        $data['user_created'] = auth()->user()->uuid;

        $sponsor = $this->sponsor->create($data);

        if($sponsor)
            return response()->json(['data'=>$sponsor,'success'=>true,'msg'=>trans('application.record_created')],201);
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
        $sponsor = $this->sponsor->findOrFail($id);
        return view('forms.sponsors.show',compact('sponsor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = $this->types->types();
        $sponsors = $this->sponsor->findOrFail($id);
        $countries = $this->countries->selectCountries();
        return view('forms.sponsors.edit',compact('types','countries','sponsors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SponsorFormRequest $request, $id)
    {
        $sponsor = $this->sponsor->findOrFail($id);
        $data = $request->all();
        $data['user_updated'] = auth()->user()->uuid;

        $sponsor->fill($data)->save();
            
        if($sponsor)
            return response()->json(['data'=>$sponsor,'success'=>true,'msg'=>trans('application.record_created')],201);
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
        $sponsor = $this->sponsor->findOrFail($uuid);
        $sponsor->fill(['user_deleted'=>auth()->user()->uuid]);
        $sponsor->delete();

       return redirect()->route('sponsors.index');
    }
}
