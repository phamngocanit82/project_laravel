
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
      <div class="container-fluid p-0"> 
        <div class="row">
          <div class="col-xl-7"><img class="bg-img-cover bg-center" src="/templates/admin/images/login/2.jpg" alt="looginpage"></div>
          <div class="col-xl-5 p-0">
            <div class="login-card">
              <form class="theme-form login-form">
                <h4>Forgot Password</h4>
                <h6>You forgot your password? Here you can easily retrieve a new password.</h6>
                <div class="form-group">
                  <label>Email Address</label>
                  <div class="input-group"><span class="input-group-text"><i class="icon-email"></i></span>
                    <input class="form-control" type="email" required="" placeholder="Test@gmail.com">
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary btn-block float-start" type="submit">Request new password</button>
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


