<?php

namespace App\Http\Controllers\Editor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Editor\Repositories\Contracts\FileInterface as File;
class FilesController extends Controller
{
    protected $file;

    public function __construct(File $file){
        $this->file = $file;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = $this->file->all();
        return view('files.index',compact('files'));
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
    public function store(Request $request)
    {
       $storagePath = storage_path().'/app/public/library';

        /*Files From Editor */
        $files = $request->file('files');
        $docsName = $files->getClientOriginalName();
        $node_id  = basename($request->file('files')->getClientOriginalName(), '.'.$request->file('files')->getClientOriginalExtension());
        if($files->move($storagePath,$docsName)){
            $data = [
                'name'            =>$docsName,
                'node_id'         =>$node_id,
                'user_created'    =>auth()->user()->uuid
            ];

            if($pdfFile =$this->file->create($data)){
                return response()->json(['files'=>$pdfFile],201);
            } 
        }

        return response()->json(['success'=>false,'msg'=>trans('application.record_failed')],400);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pdf = $this->file->getById($id);
        $file = storage_path().'/app/public/library/'.$pdf->name;
        return response()->file($file);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = $this->file->getById($id);
        if($file){
            \File::delete(storage_path().'/app/public/library/'.$file->name);
            $this->file->deleteById($file->uuid);
        }
        
        return redirect('files');
    }
}
