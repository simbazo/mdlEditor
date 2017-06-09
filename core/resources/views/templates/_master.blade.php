<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <meta name="description" content="Appenberg Editor">
   <meta name="keywords" content="Editor">
  
    <meta name="csrfToken" content="{{csrf_token()}}"/>
   <title>Editor</title>
   <!-- =============== VENDOR STYLES ===============-->
   <!-- FONT AWESOME-->
   <link rel="stylesheet" href="{{asset('assets/vendor/fontawesome/css/font-awesome.min.css')}}">
   <!-- SIMPLE LINE ICONS-->
   <link rel="stylesheet" href="{{asset('assets/vendor/simple-line-icons/css/simple-line-icons.css')}}">
   <!-- ANIMATE.CSS-->
   <link rel="stylesheet" href="{{asset('assets/vendor/animate.css/animate.min.css')}}">
   <!-- WHIRL (spinners)-->
   <link rel="stylesheet" href="{{asset('assets/vendor/whirl/dist/whirl.css')}}">
   <!-- =============== PAGE VENDOR STYLES ===============-->
   <!-- WEATHER ICONS-->
   <link rel="stylesheet" href="{{asset('assets/vendor/weather-icons/css/weather-icons.min.css')}}">

   <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars-->
   <link rel="stylesheet" href="{{asset('assets/vendor/blueimp-file-upload/css/jquery.fileupload.css')}}">

   <!-- =============== BOOTSTRAP STYLES ===============-->
   <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}" id="bscss">
    <link href="{{asset("assets/formbuilder/css/custom.css")}}" rel="stylesheet">
   <link href="{{asset('assets/css/jquery-ui.css')}}" rel="stylesheet">
   
   <link rel="stylesheet" href="{{asset('assets/css/theme-a.css')}}" id="maincss">
    <link href="{{ asset('assets/vendor/chosen_v1.2.0/chosen.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendor/sweetalert/dist/sweetalert.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset("assets/css/pace.css")}}"> 
    <link href="{{asset('assets/css/bootstrap-editable.css')}}" rel="stylesheet"/>
   <!-- =============== APP STYLES ===============-->
   
    <!-- date timepicker -->
    <link rel="stylesheet" href="{{asset('assets/date_timepicker/css/bootstrap-datetimepicker.min.css')}}"/>
    <link href="{{ asset('assets/plugins/pikaday/pikaday.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{asset('assets/treegrid/css/jquery.treegrid.css')}}">
   <link rel="stylesheet" href="{{asset('assets/css/app.css')}}" id="maincss">
    <link rel="stylesheet" href="{{asset('assets/css/tree.css')}}" id="maincss">
</head>

<body class="layout-fixed offsidebar-open" data-gr-c-s-loaded="true">
   <div class="wrapper"> 
      <!-- top navbar-->
     @include('templates.partials._header')
      <!-- sidebar-->
      @include('templates.partials._sidebar')
      <!-- offsidebar-->
      
      <!-- Main section-->
     
      <section>
         <!-- Page content-->
         <!--<div class="content-wrapper">
            <!--<div class="content-heading">
               <!-- START Language list-
               <div class="pull-right">
                  <div class="btn-group">
                     <button type="button" data-toggle="dropdown" class="btn btn-default">English</button>
                     <ul role="menu" class="dropdown-menu dropdown-menu-right animated fadeInUpShort">
                        <li><a href="#" data-set-lang="en">English</a>
                        </li>
                        <li><a href="#" data-set-lang="es">Spanish</a>
                        </li>
                     </ul>
                  </div>
               </div>
               <!-- END Language list    
               Dashboard
               <small data-localize="dashboard.WELCOME"></small>
            </div>-->
            <!-- START widgets box-->
            <!-- END widgets box-
         </div>-->

      <div style="padding-top: 10px;">
         @yield('content')
      </div>
      </section>
      <!-- Page footer-->
      <!--<footer>
         <span>&copy; 2017 - Editor</span>
      </footer>-->
   </div>
    <div id="ajax-modal" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static"></div>
    @stack('modal')
   @include('templates.partials._scripts')
   @include('common._commonjs')
   @if (Session::has('flash_notification.level'))
    <?php $message_type = Session::get('flash_notification.level'); ?>
    @if($message_type == 'success')
        <script>
            swal({title: "Success",text: "{{ Session::get('flash_notification.message') }}",type: "success"});
        </script>
    @elseif($message_type == 'danger')
        <script>
            swal({title: "Error",text: "{{ Session::get('flash_notification.message') }}",type: "error"});
        </script>
    @endif
@endif
</body>

</html>