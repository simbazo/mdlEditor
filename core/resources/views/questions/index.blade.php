<table class="table table-striped table-hover dtr-inline collapsed searchtable">
    <thead>
        <tr>
            <th>{{trans('application.name')}} </th>
            <!--<th>{{trans('application.question_type')}} </th>-->
            <th>{{trans('application.description')}} </th>
            <th >
             <h3 class="box-title pull-right">
                <div class="box-tools">
                <a href="{{ route('questions.create') }}" class="btn btn-primary btn-xs pull-right" data-toggle="ajax-modal"> <i class="fa fa-list"></i> {{trans('application.new_question')}}</a>
                </div>
            </h3>
        </th>
    </tr>
</thead>
<tbody class="fbody">
    @foreach($questions as $question)
    <tr>
        <td>{{ $question->name}}</td>
       <!-- <td>{{ $question->type->name or ''}}</td>-->

        <td>{{ $question->description}}</td>
        <td style="text-align: right;">
            {!!edit_btn('questions.edit',$question->uuid)!!}
            {!!delete_btn('questions.destroy',$question->uuid)!!}
        </td>
    </tr>
    @endforeach
</tbody>      
</table>