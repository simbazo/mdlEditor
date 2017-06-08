<?php

namespace App\Http\Controllers\Editor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Editor\Repositories\Contracts\ProductInterface as Product;
use App\Editor\Repositories\Contracts\ProductListInterface as Lists;
use App\Editor\Repositories\Contracts\QuestionInterface as Question;

class ProductsController extends Controller
{
    protected $product,$list,$question;

    public function __construct(Product $product,Lists $list,Question $question){
        $this->product =  $product;
        $this->question = $question;
        $this->list = $list;
    }
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        $products = $this->product->all();
        $lists = $this->list->all();
        $questions = $this->question->all();
        return view('products.index',compact('products','lists','questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
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

        $product = $this->product->create($data);

        if($product){
            flash()->success(trans('application.record_created'));
            return response()->json(['product'=>$product],201);
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
        $product = $this->product->getById($id);

        return view('products.edit',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $product = $this->product->getById($id);

       return view('products.edit',compact('product'));
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
        $data['user_created'] = auth()->user()->uui;
        $product = $this->product->updateById($id,$data);
        
        
        if($product){
            flash()->success(trans('application.record_updated'));
            return response()->json(['product'=>$product],201);
        }else{
            flash()->error(trans('application.record_failed'));
            return response()->json(['success'=>false,'msg'=>trans('application.record_failed')],400);
        }
    }
    public function questions(Request $request){
        $product = $this->product->getById($request->get('product_id'));
        $product->questions()->syncWithoutDetaching([$request->get('question_id')]); 
        if($product){
            return $this->preview($product->id);
        }
        return response()->json('something went wrong');
    }
    public function questionsdetach(Request $request){
        $product = $this->product->getById($request->get('product_id'));
        $product->questions()->syncWithoutDetaching([$request->get('question_id')]); 
        if($product){
            return $this->preview($product->id);
        }
        return response()->json('something went wrong');
    }

    public function preview($id){
        $product = $this->product->with('questions')->getById($id);
        return view('products.partials.search',compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $product = $this->product->deleteById($id);

        if($product)
        flash()->success('application.record_deleted');
    else
        flash()->error(trans('application.record_failed'));

    return redirect()->route('products.index');
    }
}
