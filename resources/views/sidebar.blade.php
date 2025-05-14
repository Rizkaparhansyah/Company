<nav class="sidebar sidebar-offcanvas active" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a class="nav-link profile-user">
                <div class="nav-profile-image">
                    <img src="{{asset('/')}}assets/images/faces/face1.jpg"  alt="profile">
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2" id="nm_profile" >Rizka Parhansyah</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        {{-- dashboard --}}
        <li class="nav-item">
            <a class="nav-link" href={{ url('/dashboard') }}>
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        {{-- tipe --}}
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Hero</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-account-box menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link hero"href={{ url('/hero') }}>Hero</a></li>
                </ul>
            </div>
        </li>
        {{-- campign --}}
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-aa" aria-expanded="false" aria-controls="ui-aa">
                <span class="menu-title">Campign</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-account-box menu-icon"></i>
            </a>
            <div class="collapse" id="ui-aa">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('/campign') }}">Campign</a></li>
                </ul>
            </div>
        </li>
        {{-- Services --}}
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui" aria-expanded="false" aria-controls="ui">
                <span class="menu-title">Services</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-settings menu-icon"></i>
            </a>
            <div class="collapse" id="ui">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('/services-brand') }}">Services Brand</a></li>
                </ul>
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('/services-card') }}">Services Card</a></li>
                </ul>
            </div>
        </li>
        {{-- Berita & Program --}}
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#program" aria-expanded="false" aria-controls="program">
                    <span class="menu-title">Berita & Program</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-new-box menu-icon"></i>
                </a>
                <div class="collapse" id="program">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ url('/berita') }}">Berita & Program</a></li>
                    </ul>
                    
                </div>
            </li>
        {{-- Inspirasi --}}
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#inspirasi" aria-expanded="false" aria-controls="inspirasi">
                    <span class="menu-title">Inspirasi</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-package-variant menu-icon"></i>
                </a>
                <div class="collapse" id="inspirasi">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ url('/inspirasi') }}">Inspirasi</a></li>
                    </ul>
                </div>
            </li>
        {{-- Inspirasi --}}
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#MessageUser" aria-expanded="false" aria-controls="MessageUser">
                    <span class="menu-title">Message User</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-message-text menu-icon"></i>
                </a>
                <div class="collapse" id="MessageUser">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ url('/message-user') }}">Message</a></li>
                    </ul>
                </div>
            </li>
       {{-- end --}}
       {{-- Zakat --}}
       <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#Zakat" aria-expanded="false" aria-controls="Zakat">
            <span class="menu-title">Zakat</span>
            <i class="menu-arrow"></i>
            <i class="mdi mdi-message-text menu-icon"></i>
        </a>
        <div class="collapse" id="Zakat">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ url('/zakat-profesi') }}">Zakat Profesi</a></li>
            </ul>
        </div>
    </li>
{{-- end --}}
    </ul>
</nav>

    {{-- <div class="modal-dialog ">
      <div class="modal-content card">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         
           <div class="alert alert-danger d-none dan"></div>
           <div class="alert alert-success d-none suc"></div>
            <div class="form-group row">
                <div class="nav-profile-img d-flex justify-content-center">
                    <img src="" width="100"  height="100" class="rounded-circle" alt="image">
                </div>
            </div>
            
            <div class="form-group row">
              <label for="harga" class="col-sm-3 col-form-label">Foto</label>
              <div class="col-sm-9" style="margin-top: 12px;">
                <input type="file" class="form-control" onchange="encodeImageProfileFileAsURL(this)" id="foto_profile">
              </div>
              <input type="hidden" id="nama_file_update_foto" value="">
              <input type="hidden" id="base64_update_foto" value="">
            </div>
            <div class="form-group row">
              <label for="harga" class="col-sm-3 col-form-label">Nama</label>
              <div class="col-sm-9" style="margin-top: 12px;">
                <input type="text" class="form-control" value="{{$data->name}}" id="nama_profile">
              </div>
            </div>
            <div class="form-group row " >
              <label for="harga" class="col-sm-3 col-form-label">Email</label>
              <div class="col-sm-9" style="margin-top: 12px;">
                <input type="text" class="form-control" value="{{$data->email}}" id="email_profile">
              </div>
            </div>
            <div class="form-group row">
              <label for="harga" class="col-sm-3 col-form-label">Username</label>
              <div class="col-sm-9" style="margin-top: 12px;">
                <input type="text" class="form-control" value="{{$data->username}}" id="username_profile">
              </div>
            </div>
            <div class="form-group row">
              <label for="harga" class="col-sm-3 col-form-label">Password</label>
              <div class="col-sm-9" style="margin-top: 12px;">
                <input type="password" class="form-control"  id="password_profile">
              </div>
            </div>
      </div>
         
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary simpan_profile" >Save</button>
        </div>
      </div>
    </div>
  
  </div> --}}
  {{-- endmodal --}}