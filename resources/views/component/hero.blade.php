@extends('index')
@section('title')
    Hero
@endsection
@section('main')

<div class="content-wrapper">
    <div class="row">
      <div class="grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            {{-- Modal --}}
            <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog ">
                <div class="modal-content card">
  
                  <div class="modal-header">
                    
                    
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <div class="alert alert-danger d-none"></div>
                    
                  <div class="form-group row">
                    <label for="fasilitas" class="col-sm-3 col-form-label">Nama Brand</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="name_brand" placeholder="Masukan Nama Brand">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="harga" class="col-sm-3 col-form-label">WhatsApp</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="sosmed_whatsapp" placeholder="Masukan WhatsApp">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="harga" class="col-sm-3 col-form-label">Instagram</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="sosmed_instagram" placeholder="Masukan Link Instagram">
                    </div>
                  </div>
                  <div class="form-group row">
                  <label for="gambar" class="col-sm-3 col-form-label">Facebook</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control"   id="sosmed_facebook" placeholder="Masukan Link Facebook">
                    </div>
                  </div>
                </div>
                   
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary " id="simpanHero">Save</button>
                  </div>
                </div>
              </div>
            </div>
            {{-- endmodal --}}
            <!-- Button trigger modal -->
            {{-- notif --}}
            <div class="alert alert-success d-none"></div>

            <table class="table" id="hero">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>Nama Brand</th>
                  <th>WhatsApp</th>
                  <th>Instagram</th>
                  <th>Facebook</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              
            </table>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection
