@extends('index')
@section('title')
   Services Brand
@endsection
@section('main')
<style>
  
</style>

<div class="content-wrapper">
    <div class="row">
      <div class="grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            {{-- Modal --}}
            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog ">
                <div class="modal-content card">
  
                  <div class="modal-header">
                    
                    
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <div class="alert alert-danger d-none"></div>
                    
                  <div class="form-group row">
                    <label for="fasilitas" class="col-sm-3 col-form-label">Services Brand</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="service" placeholder="Masukan Nama Service">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="harga" class="col-sm-3 col-form-label">Deskripsi</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" id="description" cols="30" rows="10"></textarea>
                    </div>
                  </div>
                  
                  
                </div>
                   
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="simpanServices">Save</button>
                  </div>
                </div>
              </div>
            </div>
            {{-- endmodal --}}
            <!-- Button trigger modal -->
            {{-- notif --}}
            <div class="alert alert-success d-none"></div>

            <table class="table" id="servicesBrand">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>Services Brand</th>
                  <th>Deskripsi</th>
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