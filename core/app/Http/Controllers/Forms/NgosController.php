<?php

namespace App\Http\Controllers\Forms;

use Illuminate\Http\Request;
use App\Models\Forms\Country;
use App\Http\Controllers\Controller;
use App\Models\Ngos\{Ngo, NgoType as Types};
use App\Http\Requests\Shared\NgoFormRequest;

class NgosController extends Controller
{
    protected $ngo, $types, $countries;


    public function __construct(Ngo $ngo, Types $types, Country $countries){
        $this->ngo = $ngo;
        $this->types = $types;
        $this->countries = $countries;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ngos = $this->ngo->with(['ngotype'])->get();

        return view('forms.ngos.index',compact('ngos'));
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
        return view('forms.ngos.create',compact('types','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NgoFormRequest $request)
    {
        $data = $request->all();
        $data['country_id'] = 193;
        $data['user_created'] = auth()->user()->uuid;

        $ngo = $this->ngo->create($data);

        if($ngo)
            return response()->json(['data'=>$ngo,'success'=>true,'msg'=>trans('application.record_created')],201);
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
        $ngo = $this->ngo->findOrFail($id);

        return view('forms.ngos.show',compact('ngo'));
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
        $ngos  = $this->ngo->findOrFail($id);
        $countries = $this->countries->selectCountries();
        return view('forms.ngos.edit',compact('types','countries','ngos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NgoFormRequest $request, $uuid)
    {
        $ngo = $this->ngo->findOrFail($uuid);

        $data = $request->all();
        $data['user_updated'] =auth()->user()->uuid;

        $ngo->fill($data)->save();

        if($ngo)
            return response()->json(['data'=>$ngo,'success'=>true,'msg'=>trans('application.record_created')],201);
        else
            return response()->json(['success'=>false,'msg'=>trans('application.record_creation_failed')],503);
    }

    public function uploadLogo(Request $request){

        $ngo = $this->ngo->findOrFail($request->get('ngo_id'));

        if ($request->hasFile('logo'))
        {
            $file = $request->file('logo');
            $filename = strtolower(str_random(50) . '.' . $file->getClientOriginalExtension());
            $file->move('assets/img/uploads/ngos/', $filename);
            \Image::make(sprintf('assets/img/uploads/ngos/%s', $filename))->resize(200, 200)->save();
            \File::delete('assets/img/uploads/ngos/'.$ngo->logo);
            $data['logo']= $filename;
            $ngo->fill($data)->save();
            flash()->success('Logo updated');
            return redirect()->route('ngos.show',$ngo->uuid);
        }

        flash()->error('Opss. Logo not uploaded, please try again');
        return redirect()->route('ngos.show',$ngo->uuid);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $ngo = $this->ngo->findOrFail($uuid);
        $ngo->fill(['user_deleted'=>auth()->user()->uuid]);
        $ngo->delete();

        return redirect()->route('ngos.index');
    }
}
