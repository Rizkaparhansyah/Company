@extends('index')
@section('title')
   Zakat
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
            <div class="modal fade" id="exampleModal13" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog ">
                <div class="modal-content card">
                  <div class="modal-header">
                    <div class="modal-title">FORM</div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form id="zakatForm">
                  <div class="modal-body">
                     <div class="alert alert-danger d-none"></div>
                  <div class="form-group row">
                    <label for="fasilitas" class="col-sm-3 col-form-label">tipe_zakat</label>
                    <div class="col-sm-9">
                      <select class="form-control" id="tipe_zakat" name="tipe_zakat">
                        <option value="PROFESI">-- PILIH ZAKAT --</option>
                        <option value="PROFESI">PROFESI</option>
                        <option value="PERDAGANGAN">PERDAGANGAN</option>
                        <option value="SIMPANAN">SIMPANAN</option>
                        <option value="EMAS">EMAS</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="fasilitas" class="col-sm-3 col-form-label">NIK(opsional)</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukan NIK Anda">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="harga" class="col-sm-3 col-form-label">NAMA</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Anda">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="harga" class="col-sm-3 col-form-label">Jumlah Donasi</label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control" name="jml_donasi" id="jml_donasi" placeholder="Masukan jml_donasi Anda" no-spin>
                      <input type="hidden" class="form-control" name="data_id" id="data_id">
                    </div>
                  </div>
                </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="simpanZakat">Save</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            {{-- endmodal --}}
            <!-- Button trigger modal -->
            <button class="mb-5 btn btn-primary tambah-data-zakat">Tambah Data</button>
            {{-- notif --}}
            <div class="alert alert-success d-none"></div>

            <table class="table" id="zakat">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>ID Campign</th>
                  <th>Tipe Zakat</th>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>Nominal</th>
                  <th>Status</th>
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
    @include('script.scriptZakat')
@endsection