@extends('templates.default')

@section('content')
    <div class="panel-body">

        <p class="text-center pv">SIGN IN TO CONTINUE.</p>

               @if (count($errors) > 0)
               {!! form_errors($errors) !!}
               @endif             
        {!! Form::open(['url' => '/auth/login','novalidate','data-parsley-validate','class'=>'mb-lg']) !!}
            <div class="form-group has-feedback">
            {!! Form::input('text','login', null, ['class'  =>"form-control", 'required'=>'required', 'placeholder'=>"Enter Email or username",'autocomplete'=>'off','required','id'=>'exampleInputEmail1','data-parsley-error-message'=>'Username or email is required']) !!}
                <span class="fa fa-envelope form-control-feedback text-muted"></span>
            </div>

            <div class="form-group has-feedback">
                {!! Form::password('password', ['class'=>"form-control", 'placeholder'=>"password", 'required','id'=>'exampleInputPassword1','data-parsley-error-message'=>'Password is required']) !!}
                <span class="fa fa-lock form-control-feedback text-muted"></span>
            </div>
    
            <div class="clearfix">
                <div class="checkbox c-checkbox pull-left mt0">
                <label>
                    {!!Form::checkbox('remember')!!}
                    <span class="fa fa-check"></span>Remember Me
                    </label>
                </div>
                <div class="pull-right"><a href="recover.html" class="text-muted">Forgot your password?</a>
                </div>
            </div>

        {!! Form::Submit('Login', ['class'=>"btn btn-block btn-success mt-lg"]) !!}

        {!! Form::close() !!}
         <p class="pt-lg text-center">LOGIN or SIGN UP WITH</p>
        <div class="row">
            <div class="col-md-12"><div class="btn-group-justified" id="socialite">
                 <a href="{{url('auth/login/facebook')}}" class="btn btn-primary">Facebook</a><!--
             <a href="{{url('auth/login/google')}}" class="btn btn-danger">Google</a>-->
             <a href="{{url('auth/login/twitter')}}" class="btn btn-info">Twitter</a>
             <a href="{{url('auth/login/github')}}" class="btn btn-default">Github</a>
        </div></div>
        </div>
    <br>
   <a href="register.html" class="btn btn-block btn-default">Register With Email</a>
    </div>
@endsection 
