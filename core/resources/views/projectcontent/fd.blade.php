@extends('templates._master')
@section('content')
<div class="col-md-12">
    <section class="contents">
<div class="row">
    <div class="col-md-12 box" id="ajax-list">
        <div class="panel panel-primary">
            <div class="panel-heading content-header">
              <div class="row">
                <div class="col-md-6">
                <button class="btn btn-success" id="edit-content">Organise List</button>
                </div>
                <div class="col-md-6">
                  <div class="form-group  pull-right">
                    <input type="text" name="" id="searchInput" class="form-control input-md" placeholder="Search...">
                  </div>
                </div>
              </div>
            </div>
            <div class="panel-body">
            <div id="loadingImage" style="display: none">
    <img src="//i.stack.imgur.com/FhHRx.gif" />
</div>

<table id="example-basic" class="table">
    <caption>
      <a href="#" onclick="jQuery('#example-basic').treetable('expandAll');  return false;">Expand all</a>
      <a href="#" onclick="jQuery('#example-basic').treetable('collapseAll'); return false;">Collapse all</a>
    </caption>
    <thead>
      <tr>
        <th>Tree column</th>
        <th>Additional data</th>
      </tr>
    </thead>
    <tbody>
      <tr data-tt-id="1" data-tt-branch='true'>
        <td>1: column 1</td>
        <td>1: column 2</td>
      </tr>

      <tr data-tt-id="2" data-tt-branch='true'>
        <td>2: column 1</td>
        <td>2: column 2</td>
      </tr>
        
      <tr data-tt-id="3" data-tt-branch='true'>
        <td>3: column 1</td>
        <td>3: column 2</td>
      </tr>
    </tbody>
  </table>
 
            </div>
        </div>
        <!-- End  Hover Rows  -->
    </div>
    </div>

    <div class="row">
        <div class="col-md-12" id="ajax-content">
            
        </div>
    </div>
</section>
</div>
@endsection

  @push('ccs')
<link rel="stylesheet" href="{{asset('assets/ckeditor/css/samples.css')}}">
<link rel="stylesheet" href="{{asset('assets/ckeditor/toolbarconfigurator/lib/codemirror/neo.css')}}">

@endpush

@push('js')
 <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
@endpush