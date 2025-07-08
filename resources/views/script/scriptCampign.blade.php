<script type="text/javascript">
    //ajax setup csrf
        var token = $('meta[name="csrf-token"]').attr('content')
    //get data
        $(document).ready(function() {
            $('#campign-table').DataTable({
                    processing: true,
                    serverside: true,
                    paging: false,
                    ordering: false,
                    info: false,
                    ajax: "{{url('campignAjax')}}",
                    columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'image',
                        name: 'image',
                        render: function(data, type, full, meta){
                            return "<img src='{{ asset('storage/images') }}/" + encodeURIComponent(data) + "' width='50'/>";
                        }

                    },
                    {
                        data: 'keluhan',
                        name: 'keluhan',
                    },
                    {
                        data: 'perusahaan',
                        name: 'perusahaan',
                    },
                    {
                        data: 'target_uang',
                        name: 'target_uang',
                    },
                    {
                        data: 'terkumpul',
                        name: 'terkumpul',
                    },
                    {
                        data: 'waktu_mulai_donasi',
                        name: 'waktu_mulai_donasi',
                    },
                    {
                        data: 'target_waktu',
                        name: 'target_waktu',
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                    }
                ],
            });
        });
    
   

     $('#formCampign').on('submit', async function (e) {
            e.preventDefault();

            const formData = new FormData(this);
            const response = await postAPI(`campignAjax`, formData);
            if (response.errors) {
                console.log(response.errors);
                $('.alert-danger').removeClass('d-none');
                $('.alert-danger').html("<ul>");
                $.each(response.errors, function(key, value) {
                    $('.alert-danger').find('ul').append("<li>" + value +
                        "</li>");
                });
                $('.alert-danger').append("</ul>");
            } else {
            setTimeout(function() {
                    $('.alert-success').removeClass('d-none');
                    $('.alert-success').html(response.success);
                    setTimeout(function() {
                        $('.alert-success').addClass('d-none');
                    }, 2500);
                }, 500);
                $('#exampleModal12').modal('hide')
            }
            // $('#exampleModal12').modal('hide');
            
            $(this)[0].reset();
            $('#campign-table').DataTable().ajax.reload();
        
        });

        

    //tambah data
            $('body').on('click', '.tambah-data-campign', function(e) {
                e.preventDefault();
                $('#exampleModal12').modal('show');
                $('#id_data').val('');
               
            });
    
    //edit data
            $(document).on('click', '.tombol-edit', function(e) {
                var id = $(this).data('id');
                $.ajax({
                    url: 'campignAjax/' + id + '/edit',
                    type: 'GET',
                    "_token": "{{ csrf_token() }}",
                    headers: {
                        'X-CSRF-TOKEN':token,
                    }, 
                    success: function(response) {
                        $('#exampleModal12').modal('show');
                        $('#id_data').val(response.result.id);
                        $('#keluhan').val(response.result.keluhan);
                        $('#target_uang').val(response.result.target_uang);
                        $('#perusahaan').val(response.result.perusahaan);
                        $('#terkumpul').val(response.result.terkumpul);
                        $('#waktu_mulai_donasi').val(response.result.waktu_mulai_donasi);
                        $('#target_waktu').val(response.result.target_waktu);
                        
                    }
                })
            });
    
    
    //delete data
            $(document).on('click', '.tombol-del', function(e) {
                if (confirm('Yakin mau hapus data ini?') === true) {
                    var id = $(this).data('id');
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN':token,
                        }, 
                        url: 'campignAjax/' + id,
                        type: 'DELETE',
                        "_token": "{{ csrf_token() }}",
                    });
                    $('#campign-table').DataTable().ajax.reload();
                } 
            });
    
    
    //hide value ketika tombol close di klik
            $('#exampleModal12').on('hidden.bs.modal', function() {
                $('#description-campign').val('')
                $('#id_data').val('')
                $('#keluhan').val('');
                $('#target_uang').val('');
                $('#perusahaan').val('');
                $('#terkumpul').val('');
                $('#waktu_mulai_donasi').val('');
                $('#target_waktu').val('');
                $('.alert-danger').addClass('d-none');
                $('.alert-danger').html('');
                $('.alert-success').addClass('d-none');
                $('.alert-success').html('');
            });
    
    </script>