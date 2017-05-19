@extends('templates._master')

@section('content')
<style>
    .comment:not(:first-child) {
                margin:20px 0 40px 60px;
                border-left: 1px solid #ccc;
                padding-left: 20px;
            }
            table .collapse.in {
            display:table-row;
        }
</style>
<div class="col-md-12">
    <section class="content" id="ajaxcontent">
<div class="row">
    <div class="col-md-12 box">
        <div class="panel panel-default">
                <div class="box-header with-border">
                    <h3 class="box-title pull-right">
                        <div class="box-tools">
                            <a href="{{ route('projects.create') }}" class="btn btn-primary btn-xs pull-right" data-toggle="ajax-modal"> <i class="icon-puzzle"></i> {{trans('application.new_project')}}</a>
                        </div>
                    </h3>
                </div>
            <div class="panel-body">
                    <h1>{{$projects->name}}</h1>
                    @include('editor.projects.partial._projects',['projects'=>$childs])
                    {{$childs->links()}}
                    
            </div>
        </div>
        <!-- End  Hover Rows  -->
    </div>
</div>
</section>
</div>

@endsection