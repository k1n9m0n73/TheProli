<!DOCTYPE html>
<html lang="en">
<head>
 @include('customer.header.header')



</head>
@include('customer.components.subheader_one')
@include('customer.components.subheader_two')

<body>

<main class="login-form">

<div class="container">
 <div class="row" form>
    <div class="panel" id="login">
        <h4 login>Reset account password  <span class="gen- btn btn-xlg btn-info">Generate password (recomended)</span></h4>
              @if (Session::has('success'))
                <div class="alert alert-success">
                    <i class="fa fa-check-circle"></i> {{ Session::get('success') }}
                </div>
                @endif

                @if(Session::has('errors'))
                <div class="alert alert-danger">
                    <i class="fa fa-check-circle"></i> {{ Session::get('errors')->first() }}
                </div>
                @endif

        <form method="POST" class="logins">
            @csrf
                  <div class="form-group" forg style="display: none;">
                      <label for="email">Recovery email address</label>
                      <div class="input-icon icon-username">
                        <i class="fa fa-user"></i>
                      </div>
                      <input autofocus="true" class="form-control" id="email" autocomplete="off"
                       name="email" placeholder="Password" tabindex="1"
                        type="email" is-req   is-req-text="Email is required" value="{{$email}}"/>
                        <input autofocus="true" class="form-control" id="email" autocomplete="off"
                       name="t" placeholder="Password" tabindex="1"
                        type="email" is-req   is-req-text="Email is required" value="{{$tok}}"/>
                    </div>

                    <div class="form-group" login>
                      <label for="email">Email address</label>
                      <div class="input-icon icon-username">
                        <i class="fa fa-lock"></i>
                      </div>
                      <input pass autofocus="true" class="form-control" id="emailr" autocomplete="off" 
                      name="password" placeholder="Password" tabindex="1" type="password" is-req   is-req-text="Email is required" />
                      <i class="fa fa-eye-slash" fa="" i-fa></i>
                    </div>


                    <div class="form-group" login>
                      <label for="password">Password</label>
                      <div class="input-icon icon-password">
                          <i class="fa fa-lock"></i>
                      </div>
                      <input pass autocomplete="off" class="form-control password" autocomplete="off" 
                      id="password" name="confirm_password" placeholder="Repeat password" tabindex="2" type="password" is-req   is-req-text="password is required">
                      <i class="fa fa-eye-slash" fa="" i-fa></i>
                    </div>


                     
                   
                      <button pass  class="btn btn-primary login btn-lg btn-block" 
                      name="commit" tabindex="3" type="button" value="Log In">Reset <i class="fa fa-spinner anim 
                      " style="opacity: 0;"></i></button>

          


        </form>
        <a class="panel-footer" href="{{ route('login') }}"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;<span>Login</span></a>
    </div>
 </div>
</div>   

</main>
   
</body> 






@include('customer.footer.footer')
<script type="text/javascript" src="{{url('/usage/customer-assets/js/repass.js')}}"></script>
</html>

<?php /*inside theme.js*/?>