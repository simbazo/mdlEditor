@extends('templates._master')
@section('content')
<div class="col-md-12">
  <section class="contents">
    <div class="row"> 
      <div class="col-lg-12">
         <!-- START panel-->

         <div class="col-md-6">
            <div class="panel panel-primary">
               <div class="panel-heading"><h4>{{$farmer->first_name . ' ' .$farmer->last_name}}</h4></div>
               <div class="panel-body">
                  <table class="table table-striped">
                   <tr>
                    <td style="width:30%"><dt>{{ trans('application.id_number') }}</dt></td>
                    <td>{{ $farmer->id_number }}</td>
                 </tr>

                 <tr>
                    <td><dt>{{ trans('application.date_of_birth') }}</dt></td>
                    <td>{{ $farmer->dob }}</td>
                 </tr>

                 <tr>
                    <td><dt>{{ trans('application.gender') }}</dt></td>
                    <td>{{ $farmer->gender->name }}</td>
                 </tr>
                 <tr>
                    <td><dt>{{ trans('Race') }}</dt></td>
                    <td>{{ $farmer->race->name }}</td>
                 </tr>
                 <tr>
                    <td><dt>{{ trans('application.phone') }}</dt></td>
                    <td>{{ $farmer->phone }}</td>
                 </tr>
                 <tr>
                    <td><dt>{{ trans('application.email') }}</dt></td>
                    <td>{{ $farmer->email }}</td>
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
              <td>{{ $farmer->country->name or '' }}</td>
           </tr>

           <tr>
              <td><dt>{{ trans('application.state_province') }}</dt></td>
              <td>{{ $farmer->province }}</td>
           </tr>

           <tr>
              <td><dt>{{ trans('application.city') }}</dt></td>
              <td>{{ $farmer->city }}</td>
           </tr>
           <tr>
              <td><dt>{{ trans('application.street_address') }}</dt></td>
              <td>{{ $farmer->address_line1 }}</td>
           </tr>
           <tr>
              <td><dt>{{ trans('application.address_2') }}</dt></td>
              <td>{{ $farmer->address_line2 }}</td>
           </tr>
           <tr>
              <td><dt>{{ trans('application.postal_zip') }}</dt></td>
              <td>{{ $farmer->postal_code }}</td>
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
