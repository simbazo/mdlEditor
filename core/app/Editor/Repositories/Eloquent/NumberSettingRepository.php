<?php namespace App\Editor\Repositories\Eloquent;

use App\Editor\Repositories\Contracts\NumberSettingInterface;

/**
* @author [Jacinto Joao] <[<jjoao@besidecod.com>]>
*/
class NumberSettingRepository extends BaseRepository
{
	
	public function model(){
		return 'App\Models\NumberSetting';
	}

	 public function prefix($type, $num){
        $prefix = $this->first();
        if($prefix){
            return $prefix->$type.$num;
        }
        return $num;
    }
}