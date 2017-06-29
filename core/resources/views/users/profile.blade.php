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

                        {!! Form::label('name',  trans('application.name')) !!}

                        {!! Form::text('name', $user->name, ['class' => 'form-control input-sm', 'required']) !!}

                    </div>

                    <div class="form-group">

                        {!! Form::label('email',  trans('application.email_address')) !!}

                        {!! Form::input('email','email', $user->email, ['class' => 'form-control input-sm', 'required']) !!}

                    </div>

                    <div class="form-group">

                        {!! Form::label('phone',  trans('application.phone')) !!}

                        {!! Form::text('phone', $user->phone, ['class' => 'form-control input-sm', 'required']) !!}

                    </div>

                    <div class="form-group">

                        {!! Form::label('password',  trans('application.password').trans('application.password_leave_blank_notification')) !!}

                        {!! Form::password('password', ['class' => 'form-control input-sm']) !!}

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