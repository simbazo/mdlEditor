<?php

namespace App\Http\Controllers\Forms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class FormsController extends Controller
{
    protected $product;
    
    public function __construct(Product $product){
        $this->product = $product;
    }
    
    public function index(){
    	//return view('forms.index');
        $products = $this->product->all();
        return view('forms.index', compact('products'));
    }
    
    public function clientForms(){
    	return "list of client forms";
        //return view('forms.index');
    }
}
