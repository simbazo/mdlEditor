@extends('templates._master')
@section('content')
<div class="col-md-12">
 <section class="contents">
  <div class="row"> 
   <div class="col-lg-12">
      <!-- START panel-->
      <div id="panelDemo14" class="panel panel-primary">
         <div class="panel-heading">
            Forms
         </div>
         <div class="panel-body ">
            <div class="col-md-8 col-md-offset-2">
               <ul class="list-group text-center">
               <a class="list-group-item" href="{{route('farmers.index')}}">Farmer Form</a>
                  <a class="list-group-item" href="{{route('farms.index')}}">Farm Form</a>
                  <a class="list-group-item" href="{{route('ngos.index')}}">NGOS Form</a>
                  <a class="list-group-item" href="{{route('sponsors.index')}}">Sponsor Form</a>
                  <a class="list-group-item" href="#">-----</a>
                  @foreach($products as $product)
                    <a class="list-group-item" href="{{route('dforms.show', $product->id)}}">{{$product->product_name}} Form</a>
                  @endforeach
               </ul>
            </div>
         </div>
      </div>
      <!-- END panel-->
   </div>
</div>
</section>
</div>
@endsection
