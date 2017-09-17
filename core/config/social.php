<?php


return [
	
	'services' => [

		'github' => [
			'name' => 'Github'
		],
		'twitter' => [
			'name' => 'Twitter'
		],
		'facebook' => [
			'name' => 'Facebook'
		],

	],

	'events'=> [

		'github'=> [
			'created'=> \App\Events\Social\GithubAccountWasLinked::class,
		],
		'twitter'=> [
			'created'=> \App\Events\Social\TwitterAccountWasLinked::class,
		],
		'facebook'=> [
			'created'=> \App\Events\Social\FacebookAccountWasLinked::class,
		]
	]
];