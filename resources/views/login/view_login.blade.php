
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Login</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('/')}}assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{asset('/')}}assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('/')}}assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('/')}}assets/images/favicon.ico" />
  </head>
  <body style="background-color: #E9E7EE; " class="mb-5">




            <div class="container d-flex align-items-center justify-content-center mt-5" >
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h2 class=" text-center mb-5">Form Login</h4>
                    <form class="forms-sample" method="POST" action="{{ url('login/proses')}}">
                        @csrf
                      <div class="form-group">
                        <label for="exampleInputUsername1">Username</label>
                        <input type="text" name="username"  autofocus class="@error('username')
                        is-invalid
                        @enderror  form-control" placeholder="Username">
                        @error('username')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control @error('password')
                        is-invalid
                        @enderror " id="exampleInputPassword1" placeholder="Password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>
                      
                      <button type="submit" class="col-12 btn btn-gradient-primary me-2">Submit</button>
                    </form>
                    <div class="text-center mt-4 font-weight-light"> Kamu tidak punya akun?<a href="{{url('/register')}}" class="text-primary"> Register</a>
                    <div class="text-center mt-4 font-weight-light"><a href="{{url('/forgot')}}" class="text-primary">  Lupa password?</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <script>
              //ajax setup csrf
              $.ajaxSetup(
                  {
                      headers: {
                          'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                      }, 
                  }
              )
          </script>

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('/')}}assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('/')}}assets/js/off-canvas.js"></script>
    <script src="{{asset('/')}}assets/js/hoverable-collapse.js"></script>
    <script src="{{asset('/')}}assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{asset('/')}}assets/js/file-upload.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>