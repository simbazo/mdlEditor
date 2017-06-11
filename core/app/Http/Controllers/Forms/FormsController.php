<?php

namespace App\Http\Controllers\Forms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormsController extends Controller
{
    public function index(){
    	return view('forms.index');
    }
    
    public function clientForms(){
    	return "list of client forms";
        //return view('forms.index');
    }
}
