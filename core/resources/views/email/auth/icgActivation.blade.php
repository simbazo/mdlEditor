Dear {{$token->user->first_name}}

We Thank  you for signing up with MiDigitalLife.

To activate your acount, we request you to verify it by clicking the link below.


<a href="{{route('auth.activate',$token)}}">{{route('auth.activate',$token)}}</a>

If you signed  up using  our mobile App, please activate your account by using the one time pin below:

OTP: {{$token->pin}}