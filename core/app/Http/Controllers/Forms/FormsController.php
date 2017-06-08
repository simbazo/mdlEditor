<?php

namespace App\Http\Controllers\Forms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormsController extends Controller
{
    public function index(){
    	return view('forms.index');
    }
}
