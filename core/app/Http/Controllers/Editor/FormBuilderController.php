<?php

namespace App\Http\Controllers\Editor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormBuilderController extends Controller
{
    public function index(){

    	return view('formbuilder.index');
    }
}
