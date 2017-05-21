<?php

	$traverse = function ($projects) use (&$traverse){
		foreach ($projects as $project):
?>
		<div class="comment">
			<h4>{{$project->uuid}}| {{$project->name or ''}}</h4>
			@if($project->childs)
			<?php $traverse($project->childs) ?>
			@endif
        </div>

<?php
		endforeach;			

	};

$traverse($projects);
?>
			
			
            