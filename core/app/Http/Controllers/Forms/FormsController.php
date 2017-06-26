<?php

namespace App\Http\Controllers\Forms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class FormsController extends Controller
{
    public function index(){
    	//return view('forms.index');
        $products = Product::all();        
    	return view('forms.index',compact('products'));
    }
    
    public function clientForms(){
    	return "list of client forms";
        //return view('forms.index');
    }
}
