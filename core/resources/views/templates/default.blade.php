<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="refresh" content="125">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{get_company_name()}} | {{trans('application.login')}}</title>
	<!-- =============== VENDOR STYLES ===============-->
   <!-- FONT AWESOME-->
   <link rel="stylesheet" href="{{asset("assets/vendor/fontawesome/css/font-awesome.min.css")}}">
   <!-- SIMPLE LINE ICONS-->
   <link rel="stylesheet" href="{{asset("assets/vendor/simple-line-icons/css/simple-line-icons.css")}}">
   <!-- =============== BOOTSTRAP STYLES ===============-->
   <link rel="stylesheet" href="{{asset("assets/css/bootstrap.css")}}" id="bscss">
   <!-- =============== APP STYLES ===============-->
   <link rel="stylesheet" href="{{asset("assets/css/app.css")}}" id="maincss">
   <link rel="stylesheet" href="{{asset("assets/css/custom.css")}}">
</head>
<body class="login-page">
   <div class="wrapper">
      <div class="block-center mt-xl wd-xl">
         <!-- START panel-->
         <div class="panel panel-dark panel-flat">
            <div class="panel-heading text-center">
               {{get_company_name()}}
            </div>
			@yield('content')
         </div>
         <!-- END panel-->
         <div class="p-lg text-center">
            <span>&copy;</span>
            <span>{{date('Y')}}</span>
            <span>-</span>
            <span>{{get_company_name()}}</span>
            <br>
            <span>Powered By Midigital</span>
         </div>
      </div>
      <div id="ajax-modal" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static"></div>
   </div>

   <!-- =============== VENDOR SCRIPTS ===============-->
   <!-- MODERNIZR-->
   <script src="{{asset("assets/vendor/modernizr/modernizr.custom.js")}}"></script>
   <!-- JQUERY-->
   <script src="{{asset("assets/vendor/jquery/dist/jquery.js")}}"></script>
   <!-- BOOTSTRAP-->
   <script src="{{asset("assets/vendor/bootstrap/dist/js/bootstrap.js")}}"></script>
   <!-- STORAGE API-->
   <script src="{{asset("assets/vendor/jQuery-Storage-API/jquery.storageapi.js")}}"></script>
   <!-- PARSLEY-->
   <script src="{{asset("assets/vendor/parsleyjs/dist/parsley.min.js")}}"></script>
   <!-- =============== APP SCRIPTS ===============-->
   <script src="{{asset("assets/js/app.js")}}"></script>	
</body>
</html>