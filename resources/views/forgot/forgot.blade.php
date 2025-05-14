
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Register</title>
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

    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
            <div class="row flex-grow">
                <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left p-5">
                    
                    <p>Forgot password</p>
            
                    <div class="alert alert-danger d-none "></div>
                    <div class="alert alert-success d-none "></div>

                    <div class="form-group">
                        <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="Email">
                    </div>
                    <div class="mt-3">
                        <button type="button" class="btn btn-sm btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn regis">Verifikasi dengan email</button>
                    </div>
                    <div class="text-center mt-4 font-weight-light"> Kamu tidak punya akun?<a href="{{url('/register')}}" class="text-primary"> Register</a>
                    <div class="text-center mt-4 font-weight-light"> Sudah punya akun? <a href="{{url('/login')}}" class="text-primary">Login</a>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
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