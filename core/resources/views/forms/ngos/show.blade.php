@extends('templates._master')
@section('content')
<div class="col-md-12">
  <section class="contents">
    <div class="row"> 
      <div class="col-lg-12">
       <!-- START panel-->

       <div class="panel panel-primary">
         <div class="panel-heading">
           <h4>{{$ngo->name}}</h4>
         </div>

         <div class="panel-body">
           <div class="col-md-4">
            {!! Form::open(['route' => ['ngo.logo'], 'id'=>'files','files'=>true]) !!}
            @if (count($errors) > 0)

            {!! form_errors($errors) !!}

            @endif
            <input type="hidden" name="ngo_id" value="{{$ngo->uuid}}">
            {!! Form::image(asset($ngo->logo != '' ? 'assets/img/uploads/ngos/'.$ngo->logo : 'assets/img/uploads/ngos/ngo.png'), 'photo', array('class' => 'img-responsive')) !!}<br>

            <div class=" form-group input-group input-file" style="margin-bottom: 10px;width:100%">
              <div class="form-control input-sm"></div>
              <span class="input-group-addon">
                <a class='btn btn-sm btn-primary' href='javascript:;'>
                  {{ trans('application.browse') }}
                  <input type="file" name="logo" id="photo" onchange="$(this).parent().parent().parent().find('.form-control').html($(this).val());">
                </a>
              </span>
            </div>
            <div class="form-group">

              <button type="submit" id="submitfiles" class="btn btn-sm btn-success">

                <i class=" fa fa-refresh "></i>

                {{trans('application.upload')}}

              </button>
              <div class="preload" style="display:none" id="loadingfiles"><img src="{{asset('assets/img/loading/cubes_loader.gif')}}"></div>
            </div>
            {!!Form::close()!!}
          </div>

          <div class="col-md-8">
           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d211692.20823218807!2d18.40435551122986!3d-34.00047615956184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1dcc4f4222a23855%3A0xd859f7801a19a533!2sEqual+Education!5e0!3m2!1sen!2sza!4v1498140654946" width="600" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
         </div>
         <div class="col-md-12">
           <table class="table table-striped table-hover dtr-inline collapsed searchtable">
            <thead>
             <tr>
              <th>NGO Type</th>
              <th>Acronym</th>
              <th>Name</th>
              <th>Contact Person</th>
              <th>Phone</th>
              <th>Email</th>
              <th>City</th>
              <th>Address</th>
            </tr>
          </thead>
          <tbody>
           <tr >
            <td>{{$ngo->ngotype->name}}</td>
            <td>{{$ngo->acronym}}</td>
            <td>{{$ngo->name}}</td>
            <td>{{$ngo->contact_person}}</td>
            <td>{{$ngo->phone}}</td>
            <td>{{$ngo->email}}</td>
            <td>{{$ngo->city}}</td>
            <td>{{$ngo->address_line1}}</td>
          </tr> 
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>


</div>
</div>
</section>
</div>
@endsection

@push('jsupload')
@include('forms.scripts.fileuplad')
@endpush
