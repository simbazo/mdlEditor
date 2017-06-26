<?php

namespace App\Http\Controllers\Forms;

use App\Models\Forms\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
//use App\Models\Farms\{Farm, FarmType};
//use App\Http\Requests\Shared\FarmFormRequest;

class DFormsController extends Controller
{
    protected $product/*$farm,$farmtype, $country*/;

    public function __construct(Product $product/*Farm $farm, FarmType $farmtype, Country $country*/){
        $this->product = $product;
        /*$this->farm = $farm;
        $this->farmtype = $farmtype;
        $this->country  = $country;*/
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product->all();
        return view('forms.dform.index', compact('products'));
        //$farms = $this->farm->all();
        //return view('forms.farm.index', compact('farms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        
        $farmtypes = $this->farmtype->farmtype();
        $countries = $this->country->selectCountries();
        return view('forms.farm.create',compact('farmtypes','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FarmFormRequest $request)
    {
    
        $data = [
            'farm_type_id'  => $request->get('farm_type_id'),
            'farm_name'     => $request->get('farm_name'),
            'size'          => $request->get('size'),
            'phone'         => $request->get('phone'),
            'email'         => $request->get('phone'),
            'country_id'    => 193,
            'province'      => $request->get('province'),
            'city'          => $request->get('city'),
            'contact_person'=> $request->get('contact_person'),
            'address_line1' => $request->get('address_line1'),
            'address_line2' => $request->get('address_line2'),
            'postal_code'   => $request->get('postal_code'),
            'user_created'  => auth()->user()->uuid
        ];

         $farm = $this->farm->create($data);

         if($farm)
            return response()->json(['data'=>$farm,'success'=>'true','msg'=>trans('application.record_created')],201);
        else
            return reponse()->json(['success'=>false,'msg'=>trans('application.record_creation_failed')],503);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product    = $this->product->with('producType', 'questions')->findOrFail($id);
        return view('forms.dform.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $farms     = $this->farm->findOrFail($id);
        $farmtypes = $this->farmtype->farmtype();
        $countries = $this->country->selectCountries();
        return view('forms.farm.edit',compact('farmtypes','countries','farms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FarmFormRequest $request, $uuid)
    {
        $farm = $this->farm->findOrFail($uuid);
        $data   = $request->all();
        $data['user_updated'] = auth()->user()->uuid;

        $farm->fill($data)->save();

        if($farm)
            return response()->json(['data'=>$farm,'success'=>true,'msg'=>trans('application.record_created')],201);
        else
            return response()->json(['success'=>false,'msg'=>trans('application.record_creation_failed')],503);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $farm = $this->farm->findOrFail($id);
        $farm->fill(['user_deleted'=>auth()->user()->uuid])->save();
        $farm->delete();

        return redirect()->route('farms.index');
    }
}
