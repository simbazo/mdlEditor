<?php

namespace App\Observers;

use App\Models\UserSocial;
/**
* @author [Jacinto Joao] <[<jacintotbrc@gmail.com>]>
*/
class UserSocialObserver
{
	
	public function created(UserSocial $userSocial)
	{
		$this->handleRegisteredEvent('created',$userSocial);
	}

	protected function handleRegisteredEvent($event, UserSocial $userSocial)
	{
		$class = config("social.events.{$userSocial->service}.{$event}",null);

		if($class === null){
			return;
		}

		event(new $class($userSocial->user()->first()));
	}

	/*in this observer we can register more then one event,
	*like we can have events 
	*@created
	*@updated
	*@deleted
	*@author [Jacinto Joao]
	**/
}