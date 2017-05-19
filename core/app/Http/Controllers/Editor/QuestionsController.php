<?php

namespace App\Http\Controllers\Editor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Editor\Repositories\Contracts\QuestionInterface as Question;
use App\Editor\Repositories\Contracts\ProductListInterface as Lists;
class QuestionsController extends Controller
{
    protected $question,$list;

    public function __construct(Question $question,Lists $list){
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
        $questions = $this->question->all();
        return view('questions.index',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lists = $this->list->lists();
        return view('questions.create',compact('lists'));
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

        $question = $this->question->create($data);

         if($question){
            flash()->success(trans('application.record_created'));
            return response()->json(['product'=>$question],201);
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
        $lists = $this->list->lists();
        $question = $this->question->getById($id);
        return view('questions.edit',compact('question','lists'));
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
        $question = $this->question->updateById($id,$data);
        
         
        if($question){
            flash()->success(trans('application.record_updated'));
            return response()->json(['product'=>$question],201);
        }else{
            flash()->error(trans('application.record_failed'));
            return response()->json(['success'=>false,'msg'=>trans('application.record_failed')],400);
        }
    }

    public function ajaxSearch(){
        return $this->question->ajaxSearch();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $questions = $this->question->deleteById($id);

        if($questions)
        flash()->success('application.record_deleted');
    else
        flash()->error(trans('application.record_failed'));

    return redirect()->route('products.index');
    }
}
