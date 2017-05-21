<?php namespace App\Editor\Repositories\Eloquent;

use App\Editor\Repositories\Contracts\UserInterface;

/**
* @author [Jacinto Joao] <[<jacintotbrc@gmail.com>]>
*/
class UserRepository extends BaseRepository implements UserInterface
{
	
	public function model(){
		return 'App\Models\User';
	}

	public function selectUser(){

		$users = $this->all();
		$listUsers = [];

		foreach ($users as $user) {
			$listUsers[$user->uuid] = $user->name;
		}

		return $listUsers;
	}
}