
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
                <h4>Recover Password</h4>
                <h6>You are only one step a way from your new password, recover your password now.</h6>
                <div class="form-group">
                  <label>Password</label>
                  <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                    <input class="form-control" type="password" name="login[password]" required="" placeholder="*********">
                    <div class="show-hide"><span class="show"></span></div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Confirm Password</label>
                  <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                    <input class="form-control" type="password" name="login[password]" required="" placeholder="*********">
                    <div class="show-hide"><span class="show"></span></div>
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary btn-block float-start" type="submit">Change password</button>
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
