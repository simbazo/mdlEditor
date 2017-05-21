<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * @author [Jacinto Joao] <[<jacintotbrc@gmail.com>]>
 */
class EditorServiceProvider extends ServiceProvider
{
    protected $repositories = ['User','Project','Navigation','Content','ProjectContent','ProjectTask','Product','ProductType','Question','ProductList','File'];

    public function register(){
        //Loops through all repositories and binds them with their Eloquent implementation
        array_walk($this->repositories, function($repository){
            $this->app->bind('App\Editor\Repositories\Contracts\\'.$repository.'Interface',
                'App\Editor\Repositories\Eloquent\\'.$repository.'Repository'
            );
        });
    }
}
 