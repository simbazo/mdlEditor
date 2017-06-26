@extends('templates._master')
@section('content')
<div class="col-md-12">
  <section class="contents">
    <div class="row"> 
      <div class="col-lg-12">
         <!-- START panel-->
         <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4>{{$product->product_name}}</h4></div>
               <div class="alert alert-info alert-dismissible" role="alert">
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   {{$product->description}}
               </div>
                <table>
                    @foreach($product->questions as $question)
                    <tr>
                        <td>{{$question->name}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection