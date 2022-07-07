<!DOCTYPE html>
<html lang="en">
<head>

    @include('header-footer.header')
<style type="text/css">
[class*="zwicon-"] {
    font-size: 3em;
    color: #000;
    position: absolute;
    top: 0px;
    right: 0;
}
</style>
</head>
<body>
<nav class="navbar navbar-light navbar-expand-lg bkg" >
        <div class="container">
            <!-- <a class="navbar-brand mr-auto" href="#">THEPROLI</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->
            <div class="collapse- navbar-collapse" id="navbarNav-">
                <ul class="navbar-nav">
                    @guest
                    <li class="nav-item">
                    <a href="/"><img style="width: 8em;" src="{{url('/proli-image/proli.png')}}" alt="" class="__img"></a>
                    </li>
                  
                    <li class="nav-item" style="margin: 2em;">
                        <a class="nav-link" href="{{ route('admin.register-user') }}" >Register</a>
                    </li>

                    <li class="nav-item" style="margin: 2em;">
                        <a class="nav-link" href="{{ route('admin.login') }}" >Login</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('signout') }}">Logout</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4 col-xs-12">
                <div class="card" style="border: 2px solid #eee; background: #ccc;">
                    <h3 class="card-header text-center bkg ht" style="color:#fff;padding:20px">Admin Login</h3>
                    <div class="card-body">
                    <span class="gen- btn btn-xlg btn-info">Generate password (recomended)</span>
                 
                        <form method="POST" action="{{route('admin.reset.password',['email'=>$data[0], 'token'=>$data[1] ])}}">
                            @csrf
                            <div class="form-group mb-3" style="position:relative">
                                <input type="password" placeholder="Password" id="password" pass class="form-control" name="password" />
                                <i class="zwicon-eye-slash" fa=''></i>   
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3" style="position:relative">
                                <input type="password" pass placeholder="Password" id="password" class="form-control" name="confirm_password" />
                                <i class="zwicon-eye-slash" fa=''></i>   
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                                @endif
                            </div>

                            
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

                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Reset</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
 
</body> 
@include('header-footer.footer')
</html>

<script typ="text/javascript">
function eyeView(){
  try {
      document.querySelectorAll("i[fa]").forEach(e=>{
        e.addEventListener('click',function(){
    
           if (this.className.match(/-eye-slash/)) {
            this.previousElementSibling.setAttribute("type","text")
            this.setAttribute("class","zwicon-eye")

           }else if (this.className.match(/-eye/)) {
            this.previousElementSibling.setAttribute("type","password")
            this.setAttribute("class","zwicon-eye-slash")

           }
            
          })  
      })
      
      
      
  } catch (error) {
    console.log(error.message )
  }

}

eyeView()
</script>

<script type="text/javascript">
  
  let path__   = location.pathname.trim().substr(1).split("/");
  document.querySelector(".ht").innerHTML  = path__[0].charAt(0).toUpperCase()+path__[0].slice(1)+' Password reset'
 // document.querySelector(".pat2").innerHTML  = path__[1]
 function genPas(){
    document.querySelector('.gen-').addEventListener('click',()=>{
       let pass =  randomStr(12,true);
       document.querySelectorAll('input[pass]').forEach(el=>{
           el.value=pass
       })
       
    })
}
genPas()
</script>