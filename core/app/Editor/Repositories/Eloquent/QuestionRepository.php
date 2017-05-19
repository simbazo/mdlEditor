<?php namespace App\Editor\Repositories\Eloquent;

use App\Editor\Repositories\Contracts\QuestionInterface;

/**
* @author [Jacinto Joao] <[<jacintotbrc@gmail.com>]>
*/
class QuestionRepository extends BaseRepository implements QuestionInterface
{
	
	public function model(){
		return 'App\Models\Question';
	}

	public function question(){
		$questions = $this->all();
		$questionList = [];

		foreach ($questions as $key) {
			$questionList[$key->uuid] = $key->name;
		}

		return $questionList;
	}
	public function ajaxSearch(){
        $term = \Request::get('data')['q'];
        $questions = $this->where('name', '%'.$term.'%','LIKE')->with('type')->get();
        $results = array();
        foreach($questions as $question){
            #$totals  = $this->invoiceTotals($invoice->uuid);
            $record = [
                'id'     => $question->uuid,
                'text'   => $question->name.' '.strtoupper($question->type->name)
            ];
            array_push($results, $record);
        }
        return $results;
    }
}