<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>deveditor.dev</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}" id="bscss">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <table class="table">
                    <thead>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </thead>
                         <tbody>
                            @foreach($items as $category)

                                <tr>

                                    <td>{{ $category->name }}</td><td>

                                    @if(count($category->childs))

                                        @include('partial',['childs' => $category->childs])

                                    @endif

                                </tr>

                            @endforeach
                </tbody>
                    </table>
                </div>
                <div class="row">

                </div>

            </div>
        </div>
    </body>
</html>
