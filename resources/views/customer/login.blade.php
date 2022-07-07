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
        <h4 login>Log in to your account</h4>
                <?php
                   if(isset($_SESSION['suc'])):
                ?>
                <div class="alert alert-success">
                    <i class="fa fa-check-circle"></i> {{ $_SESSION['suc'] }}
                </div>
                <?php
                  unset($_SESSION['suc']);
                 endif;
                ?>
                
                <?php
                   if(isset($_SESSION['err'])):
                ?>
                <div class="alert alert-danger">
                    <i class="fa fa-check-circle"></i> {{$_SESSION['err']}}
                </div>
                <?php
                  unset($_SESSION['err']);
                 endif;
                ?>
     

        <form method="POST" action="{{ route('login.custom') }}" class="login-">
            @csrf
            <div class="form-group" forg style="display: none;">
                      <label for="email">Recovery email address</label>
                      <div class="input-icon icon-username">
                        <i class="fa fa-user"></i>
                      </div>
                      <input autofocus="true" class="form-control" id="r_email" autocomplete="off" name="r_email" placeholder="Email address" tabindex="1" type="email" is-req   is-req-text="Email is required">
                    </div>

                    <div class="form-group" login>
                      <label for="email">Email address</label>
                      <div class="input-icon icon-username">
                        <i class="fa fa-user"></i>
                      </div>
                      <input autofocus="true" value="<?=isset($_SESSION['email'])?$_SESSION['email']:''?>"  class="form-control" id="email" autocomplete="off" name="email" placeholder="Email address" tabindex="1" type="email" is-req   is-req-text="Email is required">
                    </div>
                    <div class="form-group" login>
                      <label for="password">Password</label>
                      <div class="input-icon icon-password">
                          <i class="fa fa-lock"></i>
                      </div>
                      <input autocomplete="off" class="form-control password" autocomplete="off" id="password" name="password" placeholder="Password" tabindex="2" type="password" is-req   is-req-text="password is required">
                      <i class="fa fa-eye-slash" fa="" i-fa></i>
                    </div>


                       <div class="form-group" login>
                                     
                       <ul  class="list-filter color-filter">
                      
                        <li class=""><span>Remember me    </span> <input type="checkbox" name="rem" style="float: right;
    margin: 3px 11px;display: block;" />    </li> 
                       
                    
                        
                         <li class="forg_pass" style="float: right;cursor: pointer;"> <span >Forget pasword?</span></li> 
                              
                     </ul>
                        
                    </div>   
                    <li class="log_in btn btn-info btn-xs mt-3" forg style="float: right;cursor: pointer;display: none; margin: 0 0 8px;"> 
                    <span >login</span></li>
                      <button login style="margin: 33px 0;background: #f40;border: none;" class="btn btn-primary login btn-lg btn-block" 
                      name="commit" tabindex="3" type="submit" value="Log In">
                      
                      Log In <i class="fa fa-spinner anim 
                      " style="opacity: 0;"></i></button>

             <inpt forg style="margin: 33px 0;background: #f40;border: none;display: none;"
              class="btn btn-primary  btn-lg " name="commit" tabindex="3" 
              type="submit" value="Log In">Send Request <i class="fa fa-spinner anim " style="opacity: 0;"></i></button>


        </form>
        <a class="panel-footer" href="{{ route('register-user') }}">New to Shop? &nbsp;<span>Sign Up</span></a>
    </div>
 </div>
</div>   

</main>
   
</body> 



<script type="text/javascript" src="{{url('/usage/customer-assets/js/login.js')}}"></script>

@include('customer.footer.footer')
</html>

<?php /*inside theme.js*/?>