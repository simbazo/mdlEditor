<?php

namespace App\Http\Controllers\Editor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Editor\Repositories\Contracts\ProductListInterface as Lists;
class ProductListsController extends Controller
{   
    protected $list;

    public function __construct(Lists $list){
        $this->list = $list;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $lists = $this->list->all();
        return view('productlist.index',compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view('productlist.created');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_created'] = auth()->user()->uuid;

        $list = $this->list->create($data);

        if($list){
            flash()->success(trans('application.record_creatd'));
            return response()->json(['success'=>true,'msg'=>trans('application.record_creatd')],201);
        }else{
              flash()->success(trans('application.record_failed'));
            return response()->json(['success'=>false,'msg'=>trans('application.record_failed')],400);
        }

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
        $questiontype = $this->list->getById($id);

        return view('productlist.edit',compact('questiontype'));
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
         $data = $request->all();
        $data['user_updated'] = auth()->user()->uui;
        $list = $this->list->updateById($id,$data);
        
        
        if($list){
            flash()->success(trans('application.record_updated'));
            return response()->json(['product'=>$list],201);
        }else{
            flash()->error(trans('application.record_failed'));
            return response()->json(['success'=>false,'msg'=>trans('application.record_failed')],400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $list = $this->list->deleteById($id);

        if($list)
        flash()->success('application.record_deleted');
    else
        flash()->error(trans('application.record_failed'));

    return redirect()->route('products.index');

    }
        
}
