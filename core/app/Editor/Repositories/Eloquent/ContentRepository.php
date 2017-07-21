<?php namespace App\Editor\Repositories\Eloquent;

use App\Editor\Repositories\Contracts\ContentInterface;

/**
* @author [Jacinto Joao] <[<jjoao@besidecod.com>]>
*/
class ContentRepository extends BaseRepository implements ContentInterface
{
	 
	public function model(){ 
		return 'App\Models\Content';
	} 

	public function apiSearch(){
        $term = \Request::get('data')['q'];
        $content = $this->where('Header', '%'.$term.'%','LIKE')->get();
        $results = array();
        foreach($content as $con){
            #$totals  = $this->invoiceTotals($invoice->uuid);
            $record = [
                'ID'     	=> $con->uuid,
                'Header'	=> $con->Header,
                'Content'	=> $con->Content  	
            ];
            array_push($results, $record);
        }
        return $results;
    }



}