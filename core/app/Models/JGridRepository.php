<?php namespace App\Models;

use Project;
use Illuminate\Database\Eloquent\Model;
use Mgallegos\LaravelJqgrid\Repositories\EloquentRepositoryAbstract;
/**
* @author [Jacinto Joao] <[<jjoao@besidecod.com>]>
*/
class JGridRepository extends EloquentRepositoryAbstract
{
	
	public function __construct()
	{
		$this->Database = new Project();

		$this->visibleColumns = array('name','Parent_ID','ContentStart_ID');
 
        $this->orderBy = array(array('uuid', 'asc'), array('name','desc'));
	}
}
