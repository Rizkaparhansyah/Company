@extends('index')
@section('title')
    Message
@endsection
@section('main')

<div class="content-wrapper">
    <div class="row">
      <div class="grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            {{-- notif --}}
            <table class="table" id="message">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Pesan</th>
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
    
     @include('script.scriptMessage')
@endsection
