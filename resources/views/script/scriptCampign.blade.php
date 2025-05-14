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
                                return "<img src={{ URL::to('/storage/images') }}"+'/' + data + " width='50' />";
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
    
    
    // endcode image
            function encodeImageCampignFileAsURL(element) {
                var file = element.files[0];
                //   console.log(file.name);
                var reader = new FileReader();
                reader.onloadend = function() {
                    console.log('RESULT', reader.result)
                    $('#base64_image-korban').val(reader.result);
                    $('#nama_file_image-korban').val(file.name);
                }
                reader.readAsDataURL(file);
            }
    
    //tambah data
            $('body').on('click', '.tambah-data-campign', function(e) {
                e.preventDefault();

                $('#exampleModal12').modal('show');
                $('#simpanCampign').click(function(e){
                    e.preventDefault()
                        campign();
                   })
            });
    
    //edit data
            $('body').on('click', '.tombol-edit', function(e) {
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
                        $('#keluhan').val(response.result.keluhan);
                        $('#target_uang').val(response.result.target_uang);
                        $('#perusahaan').val(response.result.perusahaan);
                        $('#terkumpul').val(response.result.terkumpul);
                        $('#waktu_mulai_donasi').val(response.result.waktu_mulai_donasi);
                        $('#target-waktu').val(response.result.target_waktu);
                        $('#simpanCampign').click(function(e){
                                campign(id)
                        }
                        )
                    }
                })
            });
    
    
    //function simpan dan edit                   
       function campign(id = '') {
        if (id == '') {
                var var_url = 'campignAjax';
                var var_type = 'POST';
            } else {
                var var_url = 'campignAjax/' + id;
                var var_type = 'PUT';
            }
               $.ajax({
                headers: {
                'X-CSRF-TOKEN': token
                },
                url: var_url,
                type: var_type,
                data: {
                    image_name:$('#nama_file_image-korban').val(),
                    image: $('#base64_image-korban').val(),
                    keluhan: $('#keluhan').val(),
                    perusahaan: $('#perusahaan').val(),
                    target_uang: $('#target_uang').val(),
                    terkumpul: $('#terkumpul').val(),
                    target_waktu: $('#target-waktu').val(),
                    waktu_mulai_donasi: $('#waktu_mulai_donasi').val(),
                    "_token": "{{ csrf_token() }}",
                   },
                   success: function(response) {
                    console.log(response);
                        if (response.gagal) {
                            $('.alert-danger').removeClass('d-none');
                            $('.alert-danger').html(response.gagal);
                        }
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
                       $('#campign-table').DataTable().ajax.reload();
                   }
               });
           }
    
    
    //delete data
            $('body').on('click', '.tombol-del', function(e) {
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
                $('.alert-danger').addClass('d-none');
                $('.alert-danger').html('');
                $('.alert-success').addClass('d-none');
                $('.alert-success').html('');
            });
    
    </script>