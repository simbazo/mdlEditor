@extends('templates._master')

@section('content')

<section class="col-md-12">

    <div class="row">

        <div class="col-md-12">

        <div class="panel panel-primary">

            <div class="panel-body">

        {!! Form::open(['url' => ['profile'], 'files'=>true]) !!}

        <div class="col-md-6">

                    @if (count($errors) > 0)

                        {!! form_errors($errors) !!}

                    @endif 

                  <div class="form-group">

                        {!! Form::label('username', trans('application.username')) !!}

                        {!! Form::text('username', $user->username, ['class' => 'form-control input-sm', 'required']) !!}

                    </div>

                    <div class="form-group">

                        {!! Form::label('first_name',  trans('application.first_name')) !!}

                        {!! Form::text('first_name', $user->first_name, ['class' => 'form-control input-sm', 'required']) !!}

                    </div>

                    <div class="form-group">

                        {!! Form::label('last_name',  trans('application.last_name')) !!}

                        {!! Form::text('last_name', $user->last_name, ['class' => 'form-control input-sm', 'required']) !!}

                    </div>


                    <div class="form-group">

                        {!! Form::label('dob',  trans('application.dob')) !!}

                        {!! Form::text('dob', $user->dob, ['class' => 'form-control input-sm datepicker', 'required']) !!}

                    </div>

                    <div class="form-group">

                        {!! Form::label('sex',  trans('application.sex')) !!}

                        {!! Form::text('sex', $user->sex, ['class' => 'form-control input-sm', 'required']) !!}

                    </div>

                    <div class="form-group">

                        {!! Form::label('email',  trans('application.email_address')) !!}

                        {!! Form::input('email','email', $user->email, ['class' => 'form-control input-sm', 'required']) !!}

                    </div>

                    <div class="form-group">

                        {!! Form::label('mobile',  trans('application.mobile')) !!}

                        {!! Form::text('mobile', $user->mobile, ['class' => 'form-control input-sm', 'required']) !!}

                    </div>

                    <div class="form-group">

                        {!! Form::label('password',  trans('application.password').trans('application.password_leave_blank_notification')) !!}

                        {!! Form::password('password', ['class' => 'form-control input-sm']) !!}

                    </div>

                    <div class="form-group">

                        {!! Form::label('secret_question',  trans('application.secret_question')) !!}

                        {!! Form::text('secret_question', $user->secret_question, ['class' => 'form-control input-sm', 'required']) !!}

                    </div>

                    <div class="form-group">

                        {!! Form::label('secret_answer',  trans('application.secret_answer')) !!}

                        {!! Form::text('secret_answer', $user->secret_answer, ['class' => 'form-control input-sm', 'required']) !!}

                    </div>

                    <div class="form-group">

                        <button type="submit" class="btn btn-sm btn-success">

                            <i class=" fa fa-refresh "></i>

                            {{trans('application.update_profile')}}

                        </button>

                    </div>

             </div>

        <div class="col-md-6">

            <div class="form-group">

                <label for="photo">Profile Photo</label>

                {!! Form::image(asset($user->avatar != '' ? 'assets/img/uploads/'.$user->avatar : 'assets/img/uploads/no-image.jpg'), 'photo', array('class' => 'thumbnail')) !!}<br>

                <div class=" form-group input-group input-file" style="margin-bottom: 10px;width:50%">
                    <div class="form-control input-sm"></div>
                      <span class="input-group-addon">
                        <a class='btn btn-sm btn-primary' href='javascript:;'>
                            {{ trans('application.browse') }}
                            <input type="file" name="avatar" id="photo" onchange="$(this).parent().parent().parent().find('.form-control').html($(this).val());">
                        </a>
                      </span>
                </div>

            </div>

       </div>

        {!! Form::close() !!}

                </div>

            <div class="clearfix"></div>

            </div>

        </div>

        </div>

</section>

@endsection