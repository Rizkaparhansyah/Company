@extends('index')
@section('title')
    Services
@endsection
@section('main')

<div class="content-wrapper">
    <div class="row">
      <div class="grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            {{-- Modal --}}
            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog ">
                <div class="modal-content card">
                  
                  <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <form id="servicesCard">
                  <div class="modal-body">
                    <div class="alert alert-danger d-none "></div>
                  
                  <div class="form-group row">
                    <label for="fasilitas" class="col-sm-3 col-form-label">Nama Services</label>
                    <div class="col-sm-9">
                      <input type="hidden" class="form-control" id="data_id" name="data_id" placeholder="Masukan Nama Service">
                      <input type="text" class="form-control" id="name_services" name="name_services" placeholder="Masukan Nama Service">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="harga" class="col-sm-3 col-form-label">Deskripsi</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" id="description_services" name="description_services" cols="30" rows="10"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="harga" class="col-sm-3 col-form-label">Link Services</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="link_services" name="link_services" placeholder="Masukan Link Services">
                    </div>
                  </div>
                  
                </div>
                   
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary " id="simpanCard">Save</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            {{-- endmodal --}}
            <!-- Button trigger modal -->
            <div class="alert alert-success d-none "></div>
               
                   <button id="addCard" class="btn btn-primary btn-sm mb-4" data-toggle="modal" data-target="#exampleModal1">
                      Tambah
                    </button>
                    
            <table class="table" id="services">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>Nama Services</th>
                  <th>Deskripsi</th>
                  <th>Link Services</th>
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
@section('script')
    @include('script.scriptServices')
@endsection