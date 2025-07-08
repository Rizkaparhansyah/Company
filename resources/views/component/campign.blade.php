@extends('index')
@section('title')
    Campign
@endsection
@section('main')

<div class="content-wrapper">
    <div class="row">
      <div class="grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            
            {{-- Modal --}}
            <div class="modal fade" id="exampleModal12" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog ">
                <div class="modal-content card">
  
                  <div class="modal-header">
                    
                    
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form id="formCampign" enctype="multipart/form-data">
                  <div class="modal-body">
                    
                     <div class="alert alert-danger d-none"></div>
                      <div class="form-group row">
                        <input type="hidden" class="form-control" name="id_data" id="id_data">
                        <label for="" class="col-sm-3 col-form-label">Image</label>
                        <div class="col-sm-9">
                          <input type="file" class="form-control" name="image_campign" id="image_campign" placeholder="Masukan Gambar campign">
                        
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Keluhan</label>
                        <div class="col-sm-9">
                            <input type="text" id="keluhan" name="keluhan" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Perusahaan</label>
                        <div class="col-sm-9">
                            <input type="text" id="perusahaan" name="perusahaan" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Target Uang </label>
                        <div class="col-sm-9">
                            <input type="text" id="target_uang" name="target_uang" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Uang Terkumpul</label>
                        <div class="col-sm-9">
                            <input type="text" id="terkumpul" name="terkumpul" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Waktu Mulai Donasi</label>
                        <div class="col-sm-9">
                            <input type="date" id="waktu_mulai_donasi" name="waktu_mulai_donasi" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Target Waktu</label>
                        <div class="col-sm-9">
                            <input type="date" id="target_waktu" name="target_waktu" class="form-control">
                        </div>
                      </div>
                </div>
                   
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="simpanCampign">Save</button>
                  </div>
                  </form>
                </div>
              </div>
            
            </div>
            {{-- endmodal --}}
            <!-- Button trigger modal -->
            <button class="mb-5 btn btn-primary tambah-data-campign">Tambah Data</button>
            {{-- notif --}}
        
                      <div class="alert alert-success d-none">
                         
                      </div>
                      <div class="alert alert-danger d-none">
                         
                      </div>
                     
            
          
            <table class="table w-100" id="campign-table">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>Image</th>
                  <th>Program</th>
                  <th>Perusahaan</th>
                  <th>Target Donasi</th>
                  <th>Terkumpul</th>
                  <th>Waktu Mulai Donasi</th>
                  <th>Target Waktu Donasi</th>
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
  @include('script.scriptCampign')
@endsection