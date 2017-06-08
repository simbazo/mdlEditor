@extends('templates._master')
@section('content')
<div class="col-md-12">
  <section class="contents">
    <div class="row"> 
      <div class="col-lg-12">
       <!-- START panel-->

       <div class="col-md-6">
        <div class="panel panel-primary">
         <div class="panel-heading"><h4>{{$sponsor->sponsor_name}}</h4></div>
         <div class="panel-body">
          <table class="table table-striped">
           <tr>
            <td style="width:30%"><dt>{{ trans('Sponsor Type') }}</dt></td>
            <td>{{ $sponsor->types->name }}</td>
          </tr>
          <tr>
            <td><dt>{{ trans('application.phone') }}</dt></td>
            <td>{{ $sponsor->phone }}</td>
          </tr>
          <tr>
            <td><dt>{{ trans('application.email') }}</dt></td>
            <td>{{ $sponsor->email }}</td>
          </tr>

          <tr>
            <td><dt>{{ trans('application.postal_zip') }}</dt></td>
            <td>{{ $sponsor->postal_code }}</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="panel panel-primary">
     <div class="panel-heading"><h4>Address & Location</h4></div>
     <div class="panel-body">
      <table class="table table-striped">
       <tr>
        <td style="width:30%"><dt>{{ trans('application.country') }}</dt></td>
        <td>{{ $sponsor->country->name or '' }}</td>
      </tr>

      <tr>
        <td><dt>{{ trans('application.state_province') }}</dt></td>
        <td>{{ $sponsor->province }}</td>
      </tr>

      <tr>
        <td><dt>{{ trans('application.city') }}</dt></td>
        <td>{{ $sponsor->city }}</td>
      </tr>
      <tr>
        <td><dt>{{ trans('application.street_address') }}</dt></td>
        <td>{{ $sponsor->address_line1 }}</td>
      </tr>
      <tr>
        <td><dt>{{ trans('application.address_2') }}</dt></td>
        <td>{{ $sponsor->address_line2 }}</td>
      </tr>
    </table>
  </div>
</div>
</div>

</div>
</div>
</section>
</div>
@endsection
