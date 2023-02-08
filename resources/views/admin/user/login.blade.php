
<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.head')
</head>
<body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="theme-loader">    
        <div class="loader-p"></div>
      </div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <section>
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-7"><img class="bg-img-cover bg-center" src="/templates/admin/images/login/2.jpg" alt="looginpage"></div>
          <div class="col-xl-5 p-0">
            <div class="login-card">
              <form class="theme-form login-form" action="" method="POST">
                <h4>Login</h4>
                <h6>Welcome back! Log in to your account.</h6>
                <div class="form-group">
                  <label>Email Address</label>
                  <div class="input-group"><span class="input-group-text"><i class="icon-email"></i></span>
                    <input class="form-control" type="email" required="" placeholder="your email" value="{{old('email')}}">
                  </div>
                  @error('email')
                    <div><span class="text-danger">{{$message}}</span></div>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                    <input class="form-control" type="password" name="login[password]" required="" placeholder="*********">
                    <div class="show-hide"><span class="show"></span></div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="checkbox">
                    <input id="checkbox1" type="checkbox">
                    <label class="text-muted" for="checkbox1">Remember password</label>
                  </div><a class="link float-end" href="forget-password.html">Forgot password?</a>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary btn-block float-start" type="submit">Sign in</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    @include('admin.foot')
  </body>
</html>
