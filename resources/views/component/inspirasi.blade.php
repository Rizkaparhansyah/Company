@extends('index')
@section('title')
    Inspirasi
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
            <div class="modal fade" id="exampleModal6" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog ">
                <div class="modal-content card">
  
                  <div class="modal-header">
                    
                    
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <form id="inspirasiForm">
                  <div class="modal-body">
                   
                     <div class="alert alert-danger d-none"></div>
                      <div class="form-group row">
                        <label for="image_inspirasi" class="col-sm-3 col-form-label">Image</label>
                        <div class="col-sm-9">
                          <input type="file" class="form-control image_inspirasi" name="image_inspirasi" id="image_inspirasi" placeholder="Masukan Gambar">
                        
                          <input type="hidden" id="data_id" name="data_id" value="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="harga" class="col-sm-3 col-form-label">Deskripsi Inpirasi</label>
                        <div class="col-sm-9">
                          <textarea class="form-control description_inspirasi" name="description_inspirasi"  id="description_inspirasi" cols="30" rows="10"></textarea>
                        </div>
                      </div>
                </div>
                   
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="simpanInspirasi">Save</button>
                  </div>
                  </form>
                </div>
              </div>
            
            </div>
            {{-- endmodal --}}
            <!-- Button trigger modal -->
            <button class="mb-5 btn btn-primary tambah-data-inspirasi">Tambah Data</button>
            {{-- notif --}}
        
                      <div class="alert alert-success d-none">
                         
                      </div>
                     
            
          
            <table class="table" id="inspirasi-table">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>Image</th>
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
@section('script')
    
     @include('script.scriptInspirasi')
@endsection