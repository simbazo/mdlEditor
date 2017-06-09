@extends('templates._master')
@section('content')
<div class="col-md-12">
  <section class="contents">
    <div class="row"> 
      <div class="col-lg-12">
         <!-- START panel-->
         <div id="panelDemo14" class="panel panel-primary">
            <div class="panel-heading">
               <div class="row">
                  <div class="col-md-6">
                     <ul role="tablist" class="nav nav-tabs" id="myTab">
                        <li role="presentation" class="active"><a href="#product" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false" class="btn btn-success btn-outline">Products</a>
                        </li>
                        <li role="presentation" class=""><a href="#questions" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="false" class="btn btn-success btn-outline">Questions</a>
                        </li>
                        <li role="presentation" ><a href="#list" aria-controls="messages" role="tab" data-toggle="tab" aria-expanded="false" class="btn btn-success btn-outline">Question Type</a>
                        </li>
                     </ul>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group  pull-right">
                       <input type="text" name="" id="searchInput" class="form-control input-md" placeholder="Search...">
                    </div>
                 </div>
              </div>
           </div>
           <div class="panel-body ">
            <div role="tabpanel">
               <!-- Nav tabs-->

               <!-- Tab panes-->
               <div class="tab-content">
                  
                  <div id="product" role="tabpanel" class="tab-pane active">
                     <div class="row">
                        @include('products.product')
                     </div>
                  </div>
                  <div id="questions" role="tabpanel" class="tab-pane">
                     <div class="row">

                        @include('questions.index')
                     </div>
                  </div>
                  <div id="list" role="tabpanel" class="tab-pane">
                     @include('productlist.index')
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- END panel-->
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