<?php namespace App\Http\Controllers\FormsApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ngos\{Ngo, NgoType as Types};

/**
* @author [Jacinto Joao] <[<jjoao@besidecode.com>]>
*/
class NgosApiController extends Controller
{
	protected $ngos, $ngotypes, $types;

	public function __construct(Ngo $ngos){
		$this->ngos = $ngos;
	}

	public function index()
	{
		$ngos = $this->ngos->all();

		return response()->json(['data'=>$ngos],201);
	}
	
}